@extends('player.layout')

@section('this-element')
    <p>
        <a href="{{ route('players.index') }}"><x-icon.back class="inline"/></a>
        Player: {{ $player->name }}
    </p>
@endsection

@section('content')
    <form method="post" action="{{ route('players.update', ['player' => $player]) }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">

        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">name</div>
            <input type="text" name="name" value="{{ $player->name }}" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">birth_year</div>
            <input type="number" min="1970" max="2010" name="birth_year" value="{{ $player->birth_year }}" class="w-1/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">team</div>
            <select name="team_id" class="w-9/12 mb-3 border-gray-200 rounded-full text-center">
                <option @if (!$player->team) selected @endif value="">...</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" @if ($team->id === $player->team_id) selected @endif >{{ $team->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">sheet_name</div>
            <input type="text" name="sheet_name" value="{{ $player->sheet_name }}" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">sheet_number</div>
            <input type="number" min="1" max="99" name="sheet_number" value="{{ $player->sheet_number }}" class="w-1/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">club</div>
            <select name="club_id" class="w-9/12 mb-3 border-gray-200 rounded-full text-center">
                <option @if (!$player->club) selected @endif value="">...</option>
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}" @if ($club->id === $player->club_id) selected @endif >{{ $club->name }} ({{ $club->country }})</option>
                @endforeach
            </select>
        </label>

        <button type="submit" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-teal-500 bg-teal-50 hover:bg-teal-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Save') }}</button>
        <a href="{{ route('players.show', ['player' => $player]) }}" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-gray-500 bg-gray-50 hover:bg-gray-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Cancel') }}</a>
    </form>

    @can('delete')
        <form method="post" action="{{ route('players.destroy', ['player' => $player]) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">

            <button type="submit" class="block w-28 mt-6 p-2 shadow-md border-b-2 border-red-500 bg-red-50 hover:bg-red-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Delete') }}</button>
        </form>
    @endcan
@endsection
