@extends('team.layout')

@section('this-element')
    <div class="p-6 bg-{{ $team->color_primary ?? 'white' }} text-{{ $team->color_secondary ?? 'black' }} border-b-4 border-{{ $team->color_terciary ?? 'gray-200' }}">
        <a href="{{ route('teams.index') }}"><x-icon.back class="inline"/></a>
        Team: {{ $team->name }}
    </div>
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
        <br/>
        <label>
            color_primary
            <input type="text" name="color_primary" value="{{ $team->color_primary }}"/>
            {{-- <span class="inline-block w-8 h-8 align-middle border rounded @if ($team->color_primary) bg-{{ $team->color_primary }} @endif"></span> --}}
        </label>
        <label>
            color_secondary
            <input type="text" name="color_secondary" value="{{ $team->color_secondary }}"/>
        </label>
        <label>
            color_terciary
            <input type="text" name="color_terciary" value="{{ $team->color_terciary }}"/>
        </label>

        <button type="submit" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-teal-500 bg-teal-50 hover:bg-teal-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Save') }}</button>
        <a href="{{ route('teams.show', ['team' => $team]) }}" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-gray-500 bg-gray-50 hover:bg-gray-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Cancel') }}</a>
    </form>

    @can('delete')
        <form method="post" action="{{ route('teams.destroy', ['team' => $team]) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">

            <button type="submit" class="block w-28 mt-6 p-2 shadow-md border-b-2 border-red-500 bg-red-50 hover:bg-red-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Delete') }}</button>
        </form>
    @endcan
@endsection
