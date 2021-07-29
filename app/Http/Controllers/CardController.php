<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\RedirectResponse;
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
        return view('cards.index', compact('cards'));
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $newCard = new Cards();
        $pathImage = $newCard->uploadImage($request->file('image'));
        $newCard = $newCard->create([
            'title' => $request->input('title'),
            'image' => $pathImage,
            'description' => $request->input('description'),
            'active' => $request->boolean('active'),
        ]);

        return redirect()->route('cards.show', ['card' => $newCard->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Cards $card
     * @return View
     */
    public function show(Cards $card): View
    {
        return view('cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cards $card
     * @return View
     */
    public function edit(Cards $card): View
    {
        return view('cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cards $card
     * @return RedirectResponse
     */
    public function update(Request $request, Cards $card): RedirectResponse
    {
        $card->update($request->all());

        return redirect()->route('cards.show', ['card' => $card->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cards $card
     * @return RedirectResponse
     */
    public function destroy(Cards $card): RedirectResponse
    {
        $card->delete();
        return redirect()->route('cards.index');
    }
}
