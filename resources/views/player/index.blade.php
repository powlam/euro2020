<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Players') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('players.create') }}"><x-icon.new/></a>
    </p>

    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>birth_year</th>
                <th>team</th>
                <th>sheet_name</th>
                <th>sheet_number</th>
                <th>club</th>
                <th class='actions'></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td>{{ $player->name }}</td>
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
                    <a href="{{ route('players.edit', ['player' => $player]) }}"><x-icon.edit class="inline"/></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
