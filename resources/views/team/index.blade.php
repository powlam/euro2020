@extends('team.layout')

@section('content')
    @can('create')
        <p>
            <a href="{{ route('teams.create') }}"><x-icon.new/></a>
        </p>
    @endcan

    <table class="container mx-auto my-3 table-fixed text-center">
        <thead>
            <tr>
                <th class='text-left'>name</th>
                <th class='w-32'>country</th>
                <th class='w-16'>group</th>
                <th class='actions w-16'></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($teams as $team)
            <tr class="hover:bg-{{ $team->color_primary ?? 'gray-200' }} hover:text-{{ $team->color_secondary ?? 'black' }} border-b-2 border-transparent hover:border-{{ $team->color_terciary ?? 'gray-200' }}">
                <td class='text-left'>{{ $team->name }}</td>
                <td>{{ $team->country }}</td>
                <td>{{ $team->group }}</td>
                <td class='actions'>
                    <a href="{{ route('teams.show', ['team' => $team]) }}"><x-icon.show class="inline"/></a>
                    @can('edit')
                        <a href="{{ route('teams.edit', ['team' => $team]) }}"><x-icon.edit class="inline"/></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $teams->links() }}
@endsection
