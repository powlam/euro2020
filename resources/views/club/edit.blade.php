<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('clubs.show', ['club' => $club]) }}"><x-icon.back class="inline"/></a>
        Club: {{ $club->name }}
    </p>

    <form method="post" action="{{ route('clubs.update', ['club' => $club]) }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">

        <label>
            name
            <input type="text" name="name" value="{{ $club->name }}"/>
        </label>
        <label>
            country
            <input type="text" name="country" value="{{ $club->country }}"/>
        </label>
        <label>
            league
            <input type="text" name="league" value="{{ $club->league }}"/>
        </label>
        <button type="submit">Save</button>
    </form>

    <form method="post" action="{{ route('clubs.destroy', ['club' => $club]) }}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">

        <button type="submit">Delete</button>
    </form>
</x-app-layout>
