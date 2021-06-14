@extends('team.layout')

@section('this-element')
    <p>
        <a href="{{ route('teams.index') }}"><x-icon.back class="inline"/></a>
        NEW Team
    </p>
@endsection

@section('content')
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
@endsection
