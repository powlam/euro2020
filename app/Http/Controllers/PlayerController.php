<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();
        $teams = Team::all();
        return view('player.create', compact('clubs', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Player::create([
            'name' => $request->name,
            'birth_year' => $request->birth_year ?? null,
            'sheet_name' => $request->sheet_name ?? null,
            'sheet_number' => $request->sheet_number ?? null,
            'team_id' => $request->team_id,
            'club_id' => $request->club_id ?? null,
        ]);

        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('player.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $clubs = Club::all();
        $teams = Team::all();
        return view('player.edit', compact('player', 'clubs', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->update([
            'name' => $request->name,
            'birth_year' => $request->birth_year ?? null,
            'sheet_name' => $request->sheet_name ?? null,
            'sheet_number' => $request->sheet_number ?? null,
            'team_id' => $request->team_id,
            'club_id' => $request->club_id ?? null,
        ]);

        return redirect()->route('players.show', ['player' => $player]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index');
    }
}
