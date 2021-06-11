<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('teams.show', ['team' => $team]) }}"><x-icon.back/></a>
        Team: {{ $team->name }}
    </p>

    <form method="post" action="{{ route('teams.update', ['team' => $team]) }}">
        @csrf
        <input name="_method" type="hidden" value="PUT">

        <label>
            name
            <input type="text" name="name" value="{{ $team->name }}"/>
        </label>
        <label>
            country
            <input type="text" name="country" value="{{ $team->country }}"/>
        </label>
        <label>
            group
            <select name="group">
                <option @if (empty($team->group)) selected @endif value="">...</option>
                @foreach (App\Models\Team::$groups as $group)
                    <option @if ($group === $team->group) selected @endif >{{ $group }}</option>
                @endforeach
            </select>
        </label>
        <button type="submit">Save</button>
    </form>

    <form method="post" action="{{ route('teams.destroy', ['team' => $team]) }}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">

        <button type="submit">Delete</button>
    </form>
</x-app-layout>
