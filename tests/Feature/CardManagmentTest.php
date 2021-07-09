<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cards;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CardManagmentTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

	/** @test **/
	public function a_card_can_be_created()
	{
	    $this->withExceptionHandling();
		$response = $this->post('cards', [
			'title' => 'Card title',
			'image' => 'Card title',
			'description' => 'title',
			'active' => true
		]);
//        dd($response);
        $response->assertOk();
		$this->assertCount(1, Cards::all());

		$card = Cards::first();

		$this->assertEquals($card->title, 'Card title');
	}
}
