@extends('player.layout')

@section('this-element')
    <p>
        <a href="{{ route('players.index') }}"><x-icon.back class="inline"/></a>
        Player: {{ $player->name }}
    </p>
@endsection

@section('content')
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">name</div>
        <input type="text" name="name" value="{{ $player->name }}" disabled class="w-9/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">birth_year</div>
        <input type="text" name="birth_year" value="{{ $player->birth_year }}" disabled class="w-1/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">team</div>
        <input type="text" name="team" value="{{ $player->team->name }}" disabled class="w-9/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">sheet_name</div>
        <input type="text" name="sheet_name" value="{{ $player->sheet_name }}" disabled class="w-9/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">sheet_number</div>
        <input type="text" name="sheet_number" value="{{ $player->sheet_number }}" disabled class="w-1/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">club</div>
        <input type="text" name="club" value="@if ($player->club) {{ $player->club->name }} ({{ $player->club->country }}) @endif" disabled class="w-9/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>

    @can('edit')
        <a href="{{ route('players.edit', ['player' => $player]) }}" class="block w-1/6 text-right hover:text-gray-300"><x-icon.edit class="inline"/></a>
    @endcan
@endsection
