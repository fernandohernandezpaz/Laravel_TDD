<?php

namespace Tests\Feature;

use App\Models\Posts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use Tests\TestCase;

class PostManagmentTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

    /** @test * */
    public function list_of_posts_can_be_retrieved()
    {
        $this->withExceptionHandling();
        Posts::factory(3)->make();
        $response = $this->get(route('posts.index'));

        $response->assertOk();

        $posts = Posts::all();

        $response->assertViewIs('posts.index');
        $response->assertViewHas('posts', $posts);
    }

    /** @test * */
    public function a_post_can_be_retrieved()
    {
        $this->withoutExceptionHandling();
        $post = Posts::factory()->create();
        $response = $this->get(route('posts.show', ['post' => $post->id]));

        $response->assertOk();

        $response->assertViewIs('posts.show');
        $response->assertViewHas('post');
    }


    /** @test * */
    public function a_post_can_be_created()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('posts.store'), [
            'title' => 'Post title',
            'description' => 'title',
        ]);

        $this->assertCount(1, Posts::all());

        $post = Posts::first();

        $this->assertEquals($post->title, 'Post title');
        $response->assertRedirect(route('posts.show', $post->id));
    }

    /** @test * */
    public function a_post_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $post = Posts::factory()->create();

        $title = Str::random(25);
        $this->get(route('posts.edit', ['post' => $post->id]));
        $response = $this->call(
            'put',
            route('posts.update', ['post' => $post->id]),
            [
                'title' => $title
            ]);
//        $response = $this->put(
//            route('posts.update', ['post' => $post->id]), [
//            'title' => $title
//        ]);

        $post = $post->fresh();

        $this->assertEquals($post->title, $title);
        $response->assertRedirect(route('posts.show', ['id' => $post->id]));
    }
}
