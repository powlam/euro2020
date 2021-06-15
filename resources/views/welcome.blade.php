<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/championship') }}" class="text-sm text-gray-700 underline">{{ __('Championship') }}</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{ __('auth.Log-in') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('auth.Register') }}</a>
                    @endif
                @endauth
                @foreach (language()->allowed() as $code => $name)
                    <a href="{{ language()->back($code) }}" class="ml-4 text-sm text-gray-700 underline">{{ language()->flag($code) }} {{ $name }}</a>
                @endforeach
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('images/uefaeuro2020.png') }}" alt="UEFA Euro 2020" class="block h-64 w-auto mb-12" />
            <span class="text-4xl">{{ __('Welcome') }}</span>
        </div>
    </div>
</x-guest-layout>
