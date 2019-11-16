<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--  tailwind CDN  --}}
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{--  icons  --}}
    <script src="https://kit.fontawesome.com/bfbc96adee.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="flex items-center justify-between flex-wrap p-6 border-bottom bg-white border-teal-500">

            <div class="block lg:hidden">
                <button
                    class="flex items-center px-3 py-2 border rounded text-teal-500 border-teal-400 hover:text-teal-500 hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="flex items-center flex-shrink-0 text-pink-700 mr-6">
                    <span class="text-xl tracking-tight">Document Expiration</span>
                </div>
                <!-- Authentication Links -->
                @guest
                <a class="block lg:inline-block lg:mt-0 text-teal-500 hover:text-white mr-4"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                <a class="block lg:inline-block lg:mt-0 text-teal-500 hover:text-white mr-4"
                    href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                <div class="text-sm lg:flex-grow">
                    <a href="{{ route('home') }}"
                        class="block lg:inline-block lg:mt-0 text-teal-500 hover:text-teal-600 no-underline mr-4">
                        {{ __('My Documents') }}
                    </a>
                    <a href="{{ route('categories.index') }}"
                        class="inline-block text-sm px-4 py-2 leading-none border rounded bg-teal-500 text-white border-white hover:no-underline hover:bg-teal-300 lg:mt-0">
                        {{ __('Add New Document') }}
                    </a>
                </div>

                <account-dropdown inline-template>
                    <div class="relative group">
                        <div @click="toggleShowAccountDropDown()"
                            class="flex items-center cursor-pointer text-sm text-blue border border-white mr-4 border-b-0 group-hover:border-grey-light rounded-t-lg py-1 px-2">
                            {{ auth()->user()->name }}
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                        <div class="items-center absolute border border-t-0 rounded-b-lg p-1 bg-white group-hover:visible w-full"
                            :class="(showAccountDropDown)? '' : 'invisible'">
                            <a href="#" class="px-4 py-2 block text-black hover:bg-grey-lighter">{{ __('Profile') }}</a>
                            <hr class="border-t mx-2 border-grey-ligght">
                            <a class="px-4 py-2 block text-black hover:bg-grey-lighter" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </a>
                        </div>
                </account-dropdown>
            </div>
            @endguest
    </div>
    </nav>

    <main class="py-4 bg-gray-100">
        @yield('content')
    </main>
    </div>
</body>

</html>