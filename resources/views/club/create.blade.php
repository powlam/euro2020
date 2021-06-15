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

        <button type="submit" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-teal-500 bg-teal-50 hover:bg-teal-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Save') }}</button>
    </form>
@endsection
