@extends('club.layout')

@section('this-element')
    <p>
        <a href="{{ route('clubs.index') }}"><x-icon.back class="inline"/></a>
        Club: {{ $club->name }}
    </p>
@endsection

@section('content')
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

        <a href="{{ route('clubs.show', ['club' => $club]) }}">Cancel</a>
        <button type="submit">Save</button>
    </form>

    @can('delete')
        <form method="post" action="{{ route('clubs.destroy', ['club' => $club]) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">

            <button type="submit">Delete</button>
        </form>
    @endcan
@endsection
