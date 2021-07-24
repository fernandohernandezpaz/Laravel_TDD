<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $posts = Posts::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $newPost = new Posts();
        $newPost = $newPost->create([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('posts.show', ['post' => $newPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Posts $post
     * @return View
     */
    public function show(Posts $post): View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Posts $post
     * @return View
     */
    public function edit(Posts $post):View
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Posts $post
     * @return RedirectResponse
     */
    public function update(Request $request, Posts $post): RedirectResponse
    {
        $post->update([
            'title' => $request->input('title')
        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
