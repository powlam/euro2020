@extends('club.layout')

@section('content')
    @can('create')
        <p>
            <a href="{{ route('clubs.create') }}"><x-icon.new/></a>
        </p>
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
