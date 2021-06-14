@extends('club.layout')

@section('this-element')
    <p>
        <a href="{{ route('clubs.index') }}"><x-icon.back class="inline"/></a>
        NEW Club
    </p>
@endsection

@section('content')
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
@endsection
