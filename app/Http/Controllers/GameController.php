<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Controleer of er een ingelogde gebruiker is
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view games.');
        }

        // Haal de games van de ingelogde gebruiker op
        $games = User::find(1)->games;
        //dd($games);
        return view('games.index', compact('games'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Game opslaan in de database
        Game::create([
            'title' => $request->title,
            'user_id' => Auth::id(), // Koppel de game aan de ingelogde gebruiker
        ]);

        return redirect()->route('games.index')->with('success', 'Game successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        if ($game->user_id != Auth::id()) {
            return redirect()->route('games.index')->with('error', 'You are not authorized to edit this game');
        }

        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        if ($game->user_id != Auth::id()) {
            return redirect()->route('games.index')->with('error', 'You are not authorized to update this game');
        }

        $game->update($request->only('title'));

        return redirect()->route('games.index')->with('success', 'Game successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        if ($game->user_id != Auth::id()) {
            return redirect()->route('games.index')->with('error', 'You are not authorized to delete this game');
        }

        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game successfully deleted!');
    }
}
