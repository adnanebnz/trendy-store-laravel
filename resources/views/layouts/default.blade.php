<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased pt-10 ">
    {{-- Conteneur global --}}
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <header class="flex justify-between items-center space-x-5 text-slate-900">
            {{-- Logo --}}
            <a href="{{ route('index') }}" class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                </svg>
                <h1 class="hidden md:block font-bold text-lg">Trendy Store</h1>
            </a>
            {{-- Formulaire de recherche --}}
            <form action="{{ route('index') }}"
                class="pb-3 pr-2 flex items-center border-b border-b-slate-300 text-slate-300 focus-within:border-b-slate-900 focus-within:text-slate-900 transition">
                <input id="search" value="{{ request()->search }}"
                    class="px-2 w-full outline-none leading-none placeholder-slate-400" type="search" name="search"
                    placeholder="Rechercher un article">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            {{-- Navigation --}}
            <nav x-data="{ open: false }" x-cloak class="relative">
                <button @click="open = !open" @click.outside="if (open) open = false" @class([
                    'w-8 h-8 flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',
                    'md:hidden' => Auth::guest(),
                ])>
                    @auth
                        <img class="h-8 w-8 rounded-full" src="{{ Gravatar::get(Auth::user()->email) }}"
                            alt="Image de profil">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                        </svg>
                    @endauth
                </button>
                <ul x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" @class([
                        'absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none',
                        'md:hidden' => Auth::guest(),
                    ]) tabindex="-1">
                    @auth

                        @if (Auth::user()->isAdmin())
                            <li><a href="{{ route('admin.products.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gestion des produits</a>
                            </li>
                            <li><a href="{{ route('admin.orders.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gestion des
                                    commandes</a></li>
                        @endif
                        <li><a href="{{ route('auth.logout') }}" @click.prevent="$refs.logout.submit()"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a></li>
                        <form x-ref="logout" action="{{ route('auth.logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ route('faq') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:text-gray-900">FAQ</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:text-gray-900">Contact</a></li>
                        <li><a href="{{ route('auth.login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:text-gray-900">Connexion</a></li>
                    @endauth
                </ul>
                @guest

                    <ul class="hidden md:flex space-x-12 font-semibold">
                        <li><a href="{{ route('faq') }}"
                                class="text-gray-700 hover:text-indigo-500 transition-all duration-100 hover:underline hover:underline-offset-8">FAQ</a>
                        </li>
                        <li><a href="{{ route('contact') }}"
                                class="text-gray-700 hover:text-indigo-500 transition-all duration-100 hover:underline hover:underline-offset-8">Contact</a>
                        </li>
                        <li><a href="{{ route('auth.login') }}"
                                class="text-gray-700 hover:text-indigo-500 transition-all duration-100 hover:underline hover:underline-offset-8">Connexion</a>
                        </li>


                    </ul>
                @endguest
            </nav>
        </header>

        @if (session('status'))
            <div class="mt-10 rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <main class="mt-10 md:mt-12 lg:mt-16">
            {{ $slot }}
        </main>
    </div>
    <footer class="text-slate-600 body-font">
        <div
            class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
            <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left md:mt-0 mt-10">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                    </svg>

                    <span class="ml-3 text-xl">Trendy Store</span>
                </a>
                <p class="mt-2 text-sm text-gray-500">Vente de produits electroniques</p>
            </div>
            <div class="flex-grow flex flex-wrap md:pr-20 -mb-10 md:text-left text-center order-first">
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="{{ route('faq') }}">FAQ</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
