<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('teams.index') }}"><x-icon.back/></a>
        Team: {{ $team->name }}
    </p>

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

    <a href="{{ route('teams.edit', ['team' => $team]) }}"><x-icon.edit/></a>

    <hr>

    <h3>Players</h3>
    <ul>
        @foreach ($team->players as $player)
            <li>
                {{ $player->team->country }} {{ $player->sheet_number }} {{ $player->name }} <a href="{{ route('players.show', ['player' => $player]) }}"><x-icon.show/></a>
            </li>
        @endforeach
    </ul>
</x-app-layout>
