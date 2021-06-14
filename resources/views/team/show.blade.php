@extends('team.layout')

@section('this-element')
    <p>
        <a href="{{ route('teams.index') }}"><x-icon.back class="inline"/></a>
        Team: {{ $team->name }}
    </p>
@endsection

@section('content')
    <label>
        name
        <input type="text" name="name" value="{{ $team->name }}" readonly/>
    </label>
    <label>
        country
        <input type="text" name="country" value="{{ $team->country }}" readonly/>
    </label>
    <label>
        group
        <input type="text" name="group" value="{{ $team->group }}" readonly/>
    </label>

    @can('edit')
        <a href="{{ route('teams.edit', ['team' => $team]) }}"><x-icon.edit class="inline"/></a>
    @endcan
@endsection

@section('related-elements')
    <h3>Players</h3>
    <ul>
        @foreach ($team->players as $player)
            <li>
                {{ $player->team->country }} {{ $player->sheet_number }} {{ $player->name }} <a href="{{ route('players.show', ['player' => $player]) }}"><x-icon.show class="inline"/></a>
            </li>
        @endforeach
    </ul>
@endsection
