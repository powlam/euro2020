<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    @can('create')
        <p>
            <a href="{{ route('clubs.create') }}"><x-icon.new/></a>
        </p>
    @endcan

    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>country</th>
                <th>league</th>
                <th class='actions'></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clubs as $club)
            <tr>
                <td>{{ $club->name }}</td>
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
</x-app-layout>
