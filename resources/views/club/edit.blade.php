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

        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">name</div>
            <input type="text" name="name" value="{{ $club->name }}" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">country</div>
            <input type="text" name="country" value="{{ $club->country }}" class="w-1/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">league</div>
            <input type="text" name="league" value="{{ $club->league }}" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
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
