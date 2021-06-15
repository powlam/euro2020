@extends('club.layout')

@section('this-element')
    <p>
        <a href="{{ route('clubs.index') }}"><x-icon.back class="inline"/></a>
        Club: {{ $club->name }}
    </p>
@endsection

@section('content')
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">name</div>
        <input type="text" name="name" value="{{ $club->name }}" disabled class="w-9/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">country</div>
        <input type="text" name="country" value="{{ $club->country }}" disabled class="w-1/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">league</div>
        <input type="text" name="league" value="{{ $club->league }}" disabled class="w-9/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>

    @can('edit')
        <a href="{{ route('clubs.edit', ['club' => $club]) }}" class="block w-1/6 text-right hover:text-gray-300"><x-icon.edit class="inline"/></a>
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
