@extends('team.layout')

@section('this-element')
    <div class="p-6 bg-{{ $team->color_primary ?? 'white' }} text-{{ $team->color_secondary ?? 'black' }} border-b-4 border-{{ $team->color_terciary ?? 'gray-200' }}">
        <a href="{{ route('teams.index') }}"><x-icon.back class="inline"/></a>
        Team: {{ $team->name }}
    </div>
@endsection

@section('content')
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">name</div>
        <input type="text" name="name" value="{{ $team->name }}" disabled class="w-9/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">country</div>
        <input type="text" name="country" value="{{ $team->country }}" disabled class="w-1/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>
    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right">group</div>
        <input type="text" name="group" value="{{ $team->group }}" disabled class="w-1/12 mb-3 bg-gray-50 border-gray-200 rounded-full text-center"/>
    </label>

    <label class="inline-block w-full">
        <div class="inline-block w-1/6 text-right mb-3">colors</div>
        <div class="inline-block w-1/3 h-6 @if ($team->color_primary) bg-{{ $team->color_primary }} @else border-dashed @endif border border-gray-200 rounded-full" @if ($team->color_primary) title="{{ $team->color_primary }}" @endif></div>
        <div class="inline-block w-1/4 h-6 @if ($team->color_secondary) bg-{{ $team->color_secondary }} @else border-dashed @endif border border-gray-200 rounded-full" @if ($team->color_secondary) title="{{ $team->color_secondary }}" @endif></div>
        <div class="inline-block w-1/6 h-6 @if ($team->color_terciary) bg-{{ $team->color_terciary }} @else border-dashed @endif border border-gray-200 rounded-full" @if ($team->color_terciary) title="{{ $team->color_terciary }}" @endif></div>
    </label>

    @can('edit')
        <a href="{{ route('teams.edit', ['team' => $team]) }}" class="block w-1/6 text-right hover:text-gray-300"><x-icon.edit class="inline"/></a>
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
