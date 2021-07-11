<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $cards = Cards::all();
        dd($cards)        return view('cards.index',compact('cards'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCard = new Cards();
        $pathImage = $newCard->uploadImage($request->file('image'));
        $newCard->create([
            'title' => $request->input('title'),
            'image' => $pathImage,
            'description' => $request->input('description'),
            'active' => $request->boolean('active'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cards $cards
     * @return \Illuminate\Http\Response
     */
    public function show(Cards $cards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cards $cards
     * @return \Illuminate\Http\Response
     */
    public function edit(Cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cards $cards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cards $cards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cards $cards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cards $cards)
    {
        //
    }
}
