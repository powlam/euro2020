@extends('team.layout')

@section('this-element')
    <p>
        <a href="{{ route('teams.index') }}"><x-icon.back class="inline"/></a>
        Team: {{ $team->name }}
    </p>
@endsection

@section('content')
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

        <a href="{{ route('teams.show', ['team' => $team]) }}">Cancel</a>
        <button type="submit">Save</button>
    </form>

    @can('delete')
        <form method="post" action="{{ route('teams.destroy', ['team' => $team]) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">

            <button type="submit">Delete</button>
        </form>
    @endcan
@endsection
