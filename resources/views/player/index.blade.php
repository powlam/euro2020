@extends('player.layout')

@section('content')
    @can('create')
        <p>
            <a href="{{ route('players.create') }}"><x-icon.new/></a>
        </p>
    @endcan

    <table class="container mx-auto my-3 table-fixed text-center">
        <thead>
            <tr>
                <th class='text-left'>name</th>
                <th class='w-16'>birth_year</th>
                <th class='w-32'>team</th>
                <th>sheet_name</th>
                <th class='w-16'>sheet_number</th>
                <th>club</th>
                <th class='actions w-16'></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr class="hover:bg-gray-100">
                <td class='text-left'>{{ $player->name }}</td>
                <td>{{ $player->birth_year }}</td>
                <td>{{ $player->team->country }}</td>
                <td>{{ $player->sheet_name }}</td>
                <td>{{ $player->sheet_number }}</td>
                <td>
                    @if ($player->club)
                        {{ $player->club->name }} ({{ $player->club->country }})
                    @endif
                </td>
                <td class='actions'>
                    <a href="{{ route('players.show', ['player' => $player]) }}"><x-icon.show class="inline"/></a>
                    @can('edit')
                        <a href="{{ route('players.edit', ['player' => $player]) }}"><x-icon.edit class="inline"/></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $players->links() }}
@endsection
