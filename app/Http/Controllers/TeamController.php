<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::paginate();
        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');

        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create');

        Team::create([
            'name' => $request->name,
            'country' => $request->country,
            'group' => $request->group ?? null,
            'color_primary' => $request->color_primary ?? null,
            'color_secondary' => $request->color_secondary ?? null,
            'color_terciary' => $request->color_terciary ?? null,
        ]);

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $this->authorize('edit');

        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->authorize('edit');

        $team->update([
            'name' => $request->name,
            'country' => $request->country,
            'group' => $request->group ?? null,
            'color_primary' => $request->color_primary ?? null,
            'color_secondary' => $request->color_secondary ?? null,
            'color_terciary' => $request->color_terciary ?? null,
        ]);

        return redirect()->route('teams.show', ['team' => $team]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $this->authorize('delete');

        $team->delete();

        return redirect()->route('teams.index');
    }
}
