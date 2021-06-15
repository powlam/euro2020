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

        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">name</div>
            <input type="text" name="name" value="{{ $team->name }}" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">country</div>
            <input type="text" name="country" value="{{ $team->country }}" class="w-1/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">group</div>
            <select name="group" class="w-1/12 mb-3 border-gray-200 rounded-full text-center">
                <option @if (empty($team->group)) selected @endif value="">...</option>
                @foreach (App\Models\Team::$groups as $group)
                    <option @if ($group === $team->group) selected @endif >{{ $group }}</option>
                @endforeach
            </select>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">color_primary</div>
            <input type="text" name="color_primary" value="{{ $team->color_primary }}" class="w-5/12 mb-3 border-gray-200 rounded-full text-center"/>
            {{-- <span class="inline-block w-8 h-8 align-middle border rounded @if ($team->color_primary) bg-{{ $team->color_primary }} @endif"></span> --}}
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">color_secondary</div>
            <input type="text" name="color_secondary" value="{{ $team->color_secondary }}" class="w-5/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">color_terciary</div>
            <input type="text" name="color_terciary" value="{{ $team->color_terciary }}" class="w-5/12 mb-3 border-gray-200 rounded-full text-center"/>
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
