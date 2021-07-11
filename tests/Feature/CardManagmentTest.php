<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Cards;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CardManagmentTest extends TestCase
{
    use WithoutMiddleware;
//    use RefreshDatabase;

    /** @test * */
    public function list_of_cards_can_be_retrieved()
    {
        $this->withExceptionHandling();
        Cards::factory()->count(3)->make();
        $response = $this->get('/cards');
        $response->assertOk();

        $cards = Cards::all();

        $response->assertViewIs('cards.index');
        $response->assertViewHas('cards', $cards);
    }

    /** @test * */
    public function a_card_can_be_created()
    {
        $this->withExceptionHandling();
        Storage::fake('cards');
        $response = $this->post('/cards', [
            'title' => 'Card title',
            'image' => UploadedFile::fake()->image('cards.png'),
            'description' => 'title',
            'active' => true
        ]);
        $response->assertOk();
        $this->assertCount(1, Cards::all());

        $card = Cards::first();

        $this->assertEquals($card->title, 'Card title');
    }
}
