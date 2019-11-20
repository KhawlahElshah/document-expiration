<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

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
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">

    {{--  icons  --}}
    <script src="https://kit.fontawesome.com/bfbc96adee.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body,
        * {
            font-family: 'Tajawal', sans-serif;
        }
    </style>
</head>

<body>
    <div id="app">
        <vue-navbar inline-template>
            <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
                <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <span class="font-semibold text-xl tracking-tight">Document Expiration</span>
                </div>
                <div class="block lg:hidden">
                    <button
                        class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white"
                        @click="toggleMobileNavbar()">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>{{ __('Menu') }}</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto"
                    :class="(! showMobileNavbar)? 'sm:hidden sm:hidden':'sm:block sm:block'">
                    <div class="text-sm lg:flex-grow">
                        @guest
                        <a href="{{ route('login') }}"
                            class="block lg:inline-block sm:mt-2 lg:mt-0 text-teal-200 hover:text-white ml-4">
                            {{ __('messages.Login') }}
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block lg:inline-block sm:mt-2 lg:mt-0 text-teal-200 hover:text-white ml-4">
                            {{ __('messages.Register') }}
                        </a>
                        @endif
                        @else
                        <a href="{{ route('home') }}"
                            class="block lg:inline-block sm:mt-2 lg:mt-0 text-teal-200 hover:text-white ml-4">
                            {{ __('messages.My Documents') }}
                        </a>
                        <a href="{{ route('categories.index') }}"
                            class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:bg-teal-600 sm:mt-2 lg:mt-0">
                            {{ __('messages.Add New Document') }}
                        </a>
                    </div>
                    <div>

                        <div class="relative group">
                            <div @click="toggleShowAccountDropDown()"
                                class="flex items-center cursor-pointer text-lg text-white sm:mt-2 mr-4 py-1 px-2">
                                <img class="w-10 h-10 rounded-full mr-2"
                                    src="https://i.ya-webdesign.com/images/user-avatar-png-7.png"
                                    alt="Avatar of Jonathan Reinink">
                                {{ auth()->user()->name }}
                                <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                            <div class="items-center absolute border border-t-0 rounded-b-lg p-1 bg-white group-hover:visible w-full"
                                :class="(showAccountDropDown)? '' : 'invisible'">
                                <a href="#"
                                    class="px-4 py-2 block text-black hover:bg-grey-lighter">{{ __('Profile') }}</a>
                                <hr class="border-t mx-2 border-grey-ligght">
                                <a class="px-4 py-2 block text-black hover:bg-grey-lighter" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('messages.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                </a>
                            </div>

                        </div>
                        @endguest
                    </div>
            </nav>
        </vue-navbar>
        <main class="py-4 bg-gray-100">
            @yield('content')
        </main>
    </div>
</body>

</html>