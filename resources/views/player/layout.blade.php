<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Players') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @hasSection('this-element')
                <div class="bg-white mb-6 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @yield('this-element')
                    </div>
                </div>
            @endif

            <div class="bg-white mb-6 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @yield('content')
                </div>
            </div>

            @hasSection('related-elements')
                <div class="bg-white mb-6 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @yield('related-elements')
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
