@extends('club.layout')

@section('content')
    @can('create')
        <a href="{{ route('clubs.create') }}" class="block mt-3 p-2 shadow-md border-b-2 border-teal-500 bg-teal-50 hover:bg-teal-200 rounded-md cursor-pointer text-center text-sm"><x-icon.new class="inline-block"/></a>
    @endcan

    <table class="container mx-auto my-3 table-fixed text-center">
        <thead>
            <tr>
                <th class='text-left'>name</th>
                <th class='w-32'>country</th>
                <th>league</th>
                <th class='actions w-16'></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clubs as $club)
            <tr class="hover:bg-gray-100">
                <td class='text-left'>{{ $club->name }}</td>
                <td>{{ $club->country }}</td>
                <td>{{ $club->league }}</td>
                <td class='actions'>
                    <a href="{{ route('clubs.show', ['club' => $club]) }}"><x-icon.show class="inline"/></a>
                    @can('edit')
                        <a href="{{ route('clubs.edit', ['club' => $club]) }}"><x-icon.edit class="inline"/></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $clubs->links() }}
@endsection
