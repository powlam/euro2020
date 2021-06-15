@extends('team.layout')

@section('this-element')
    <div class="p-6 bg-white border-b-4 border-gray-200">
        <a href="{{ route('teams.index') }}"><x-icon.back class="inline"/></a>
        NEW Team
    </div>
@endsection

@section('content')
    <form method="post" action="{{ route('teams.store') }}">
        @csrf
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">name</div>
            <input type="text" name="name" class="w-9/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">country</div>
            <input type="text" name="country" class="w-1/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">group</div>
            <select name="group" class="w-1/12 mb-3 border-gray-200 rounded-full text-center">
                <option value="">...</option>
                @foreach (App\Models\Team::$groups as $group)
                    <option>{{ $group }}</option>
                @endforeach
            </select>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">color_primary</div>
            <input type="text" name="color_primary" class="w-5/12 mb-3 border-gray-200 rounded-full text-center"/>
            {{-- <span class="inline-block w-8 h-8 align-middle border rounded @if ($team->color_primary) bg-{{ $team->color_primary }} @endif"></span> --}}
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">color_secondary</div>
            <input type="text" name="color_secondary" class="w-5/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>
        <label class="inline-block w-full">
            <div class="inline-block w-1/6 text-right">color_terciary</div>
            <input type="text" name="color_terciary" class="w-5/12 mb-3 border-gray-200 rounded-full text-center"/>
        </label>

        <button type="submit" class="block w-28 mt-3 p-2 shadow-md border-b-2 border-teal-500 bg-teal-50 hover:bg-teal-200 rounded-md cursor-pointer text-center text-sm uppercase">{{ __('Save') }}</button>
    </form>
@endsection
