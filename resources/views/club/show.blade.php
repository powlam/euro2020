<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('clubs.index') }}"><x-icon.back class="inline"/></a>
        Club: {{ $club->name }}
    </p>

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

    <hr>

    <h3>Players</h3>
    <ul>
        @foreach ($club->players as $player)
            <li>
                {{ $player->team->country }} {{ $player->sheet_number }} {{ $player->name }} <a href="{{ route('players.show', ['player' => $player]) }}"><x-icon.show class="inline"/></a>
            </li>
        @endforeach
    </ul>
</x-app-layout>
