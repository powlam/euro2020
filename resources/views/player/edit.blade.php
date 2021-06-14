<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Players') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('players.show', ['player' => $player]) }}"><x-icon.back class="inline"/></a>
        Player: {{ $player->name }}
    </p>

    <form method="post" action="{{ route('players.update', ['player' => $player]) }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">

        <label>
            name
            <input type="text" name="name" value="{{ $player->name }}"/>
        </label>
        <label>
            birth_year
            <input type="number" min="1970" max="2010" name="birth_year" value="{{ $player->birth_year }}"/>
        </label>
        <label>
            team
            <select name="team_id">
                <option @if (!$player->team) selected @endif value="">...</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" @if ($team->id === $player->team_id) selected @endif >{{ $team->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            sheet_name
            <input type="text" name="sheet_name" value="{{ $player->sheet_name }}"/>
        </label>
        <label>
            sheet_number
            <input type="number" min="1" max="99" name="sheet_number" value="{{ $player->sheet_number }}"/>
        </label>
        <label>
            club
            <select name="club_id">
                <option @if (!$player->club) selected @endif value="">...</option>
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}" @if ($club->id === $player->club_id) selected @endif >{{ $club->name }} ({{ $club->country }})</option>
                @endforeach
            </select>
        </label>
        <button type="submit">Save</button>
    </form>

    <form method="post" action="{{ route('players.destroy', ['player' => $player]) }}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">

        <button type="submit">Delete</button>
    </form>
</x-app-layout>
