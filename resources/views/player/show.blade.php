@extends('player.layout')

@section('this-element')
    <p>
        <a href="{{ route('players.index') }}"><x-icon.back class="inline"/></a>
        Player: {{ $player->name }}
    </p>
@endsection

@section('content')
    <label>
        name
        <input type="text" name="name" value="{{ $player->name }}" readonly/>
    </label>
    <label>
        birth_year
        <input type="text" name="birth_year" value="{{ $player->birth_year }}" readonly/>
    </label>
    <label>
        team
        <input type="text" name="team" value="{{ $player->team->name }}" readonly/>
    </label>
    <label>
        sheet_name
        <input type="text" name="sheet_name" value="{{ $player->sheet_name }}" readonly/>
    </label>
    <label>
        sheet_number
        <input type="text" name="sheet_number" value="{{ $player->sheet_number }}" readonly/>
    </label>
    <label>
        club
        <input type="text" name="club" value="@if ($player->club) {{ $player->club->name }} ({{ $player->club->country }}) @endif" readonly/>
    </label>

    @can('edit')
        <a href="{{ route('players.edit', ['player' => $player]) }}"><x-icon.edit class="inline"/></a>
    @endcan
@endsection
