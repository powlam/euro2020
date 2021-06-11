<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <p>
        <a href="{{ route('teams.create') }}"><x-icon.new/></a>
    </p>

    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>country</th>
                <th>group</th>
                <th class='actions'></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->country }}</td>
                <td>{{ $team->group }}</td>
                <td class='actions'>
                    <a href="{{ route('teams.show', ['team' => $team]) }}"><x-icon.show/></a>
                    <a href="{{ route('teams.edit', ['team' => $team]) }}"><x-icon.edit/></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
