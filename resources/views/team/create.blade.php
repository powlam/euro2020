<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('teams.index') }}"><x-icon.back class="inline"/></a>
        NEW Team
    </p>

    <form method="post" action="{{ route('teams.store') }}">
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
            group
            <select name="group">
                <option value="">...</option>
                @foreach (App\Models\Team::$groups as $group)
                    <option>{{ $group }}</option>
                @endforeach
            </select>
        </label>
        <button type="submit">Save</button>
    </form>
</x-app-layout>
