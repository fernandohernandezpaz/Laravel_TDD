<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Cards;

class CardManagmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function list_of_cards_can_be_retrieved()
    {
        $this->withoutExceptionHandling();
        Cards::factory(3)->make();
        $response = $this->get(route('cards.index'));
        $response->assertOk();

        $cards = Cards::all();

        $response->assertViewIs('cards.index');
        $response->assertViewHas('cards', $cards);
    }

    /** @test * */
    public function a_card_can_be_retrieved()
    {
        $this->withoutExceptionHandling();
        $card = Cards::factory()->create();
        $response = $this->get(route('cards.show', ['card' => $card->id]));

        $response->assertOk();

        $response->assertViewIs('cards.show');
        $response->assertViewHas('card');
    }

    /** @test * */
    public function a_card_can_be_created()
    {
        $this->withoutExceptionHandling();
        Storage::fake('cards');
        $response = $this->post('/cards', [
            'title' => 'Card title',
            'image' => UploadedFile::fake()->image('cards.png'),
            'description' => 'title',
            'active' => true
        ]);

        $this->assertCount(1, Cards::all());

        $card = Cards::first();

        $this->assertEquals($card->title, 'Card title');
        $response->assertRedirect(route('cards.show', $card->id));
    }

    /** @test * */
    public function a_card_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $card = Cards::factory()->create(['active'=>true]);

        $title = Str::random(25);
        $response = $this->put(
            route('cards.update', ['card' => $card->id]), [
            'title' => $title,
            'active' => false
        ]);

        $card = $card->fresh();
        $this->assertEquals($card->title, $title);
        $response->assertRedirect(route('cards.show', ['card' => $card->id]));
    }

    /** @test * */
    public function a_card_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $card = Cards::factory()->create();

        $response = $this->delete(
            route('cards.destroy', ['card' => $card->id]), [
        ]);

        $response->assertRedirect(route('cards.index'));
    }
}
