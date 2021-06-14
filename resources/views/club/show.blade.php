@extends('club.layout')

@section('this-element')
    <p>
        <a href="{{ route('clubs.index') }}"><x-icon.back class="inline"/></a>
        Club: {{ $club->name }}
    </p>
@endsection

@section('content')
    <label>
        name
        <input type="text" name="name" value="{{ $club->name }}" readonly/>
    </label>
    <label>
        country
        <input type="text" name="country" value="{{ $club->country }}" readonly/>
    </label>
    <label>
        league
        <input type="text" name="league" value="{{ $club->league }}" readonly/>
    </label>

    @can('edit')
        <a href="{{ route('clubs.edit', ['club' => $club]) }}"><x-icon.edit class="inline"/></a>
    @endcan
@endsection

@section('related-elements')
    <h3>Players</h3>
    <ul>
        @foreach ($club->players as $player)
            <li>
                {{ $player->team->country }} {{ $player->sheet_number }} {{ $player->name }} <a href="{{ route('players.show', ['player' => $player]) }}"><x-icon.show class="inline"/></a>
            </li>
        @endforeach
    </ul>
@endsection
