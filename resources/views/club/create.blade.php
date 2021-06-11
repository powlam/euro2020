<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('clubs.index') }}"><x-icon.back/></a>
        NEW Club
    </p>

    <form method="post" action="{{ route('clubs.store') }}">
        @csrf
        <label>
            name
            <input type="text" name="name"/>
        </label>
        <label>
            country
            <input type="text" name="country"/>
        </label>
        <label>
            league
            <input type="text" name="league"/>
        </label>
        <button type="submit">Save</button>
    </form>
</x-app-layout>
