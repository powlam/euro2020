@extends('player.layout')

@section('this-element')
    <p>
        <a href="{{ route('players.index') }}"><x-icon.back class="inline"/></a>
        NEW Player
    </p>
@endsection

@section('content')
    <form method="post" action="{{ route('players.store') }}">
        @csrf
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">name</div>
            <input type="text" name="name" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">birth_year</div>
            <input type="number" min="1970" max="2010" name="birth_year" class="w-1/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">team</div>
            <select name="team_id" class="w-9/12 mb-3 border-gray-200 rounded-full text-center">
                <option disabled value="">...</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">sheet_name</div>
            <input type="text" name="sheet_name" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">sheet_number</div>
            <input type="number" min="1" max="99" name="sheet_number" class="w-1/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">club</div>
            <select name="club_id" class="w-9/12 mb-3 border-gray-200 rounded-full text-center">
                <option disabled value="">...</option>
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }} ({{ $club->country }})</option>
                @endforeach
            </select>
        </label>

        <button type="submit" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-teal-500 bg-teal-50 hover:bg-teal-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Save') }}</button>
    </form>
@endsection
