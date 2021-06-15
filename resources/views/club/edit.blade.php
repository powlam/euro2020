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

        <button type="submit" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-teal-500 bg-teal-50 hover:bg-teal-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Save') }}</button>
        <a href="{{ route('clubs.show', ['club' => $club]) }}" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-gray-500 bg-gray-50 hover:bg-gray-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Cancel') }}</a>
    </form>

    @can('delete')
        <form method="post" action="{{ route('clubs.destroy', ['club' => $club]) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">

            <button type="submit" class="block w-28 mt-6 p-2 shadow-md border-b-2 border-red-500 bg-red-50 hover:bg-red-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Delete') }}</button>
        </form>
    @endcan
@endsection
