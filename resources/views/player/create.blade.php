<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Players') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('players.index') }}"><x-icon.back class="inline"/></a>
        NEW Player
    </p>

    <form method="post" action="{{ route('players.store') }}">
        @csrf
        <label>
            name
            <input type="text" name="name"/>
        </label>
        <label>
            birth_year
            <input type="number" min="1970" max="2010" name="birth_year"/>
        </label>
        <label>
            team
            <select name="team_id">
                <option disabled value="">...</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            sheet_name
            <input type="text" name="sheet_name"/>
        </label>
        <label>
            sheet_number
            <input type="number" min="1" max="99" name="sheet_number"/>
        </label>
        <label>
            club
            <select name="club_id">
                <option disabled value="">...</option>
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }} ({{ $club->country }})</option>
                @endforeach
            </select>
        </label>
        <button type="submit">Save</button>
    </form>
</x-app-layout>
