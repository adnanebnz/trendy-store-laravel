<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased pt-10 bg-gradient-to-br from-orange-50/30 to-amber-50/20">
    {{-- Conteneur global --}}
    <div class="mx-auto max-w-7xl px-3 sm:px-6 lg:px-8">
        {{-- Header --}}
        <header class="flex justify-between items-center space-x-5 text-slate-900">
            {{-- Logo --}}
            <a href="{{ route('index') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/LOGO-trendy.png') }}" alt="Logo" class="h-16 w-16">
            </a>
            {{-- Formulaire de recherche --}}
            <form action="{{ route('index') }}"
                class="pb-3 pr-2 flex items-center border-b border-b-slate-300 text-slate-300 focus-within:border-b-slate-900 focus-within:text-slate-900 transition">
                <input id="search" value="{{ request()->search }}"
                    class="px-2 bg-transparent w-full outline-none leading-none placeholder-slate-400" type="search"
                    name="search" placeholder="البحث عن منتج">
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
                    'w-8 h-8 flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2',
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
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">اداره المنتجات</a>
                            </li>
                            <li><a href="{{ route('admin.orders.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">ادارة الطلبات</a></li>
                            <li><a href="{{ route('admin.contacts.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">إدارة الرسائل</a></li>
                        @endif
                        <li><a href="{{ route('auth.logout') }}" @click.prevent="$refs.logout.submit()"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">تسجيل خروج</a></li>
                        <form x-ref="logout" action="{{ route('auth.logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ route('faq') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:text-gray-900">شروط الاستخدام</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:text-gray-900">اتصل بنا</a></li>
                        <li><a href="{{ route('auth.login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:text-gray-900">تسجيل الدخول</a></li>
                    @endauth
                </ul>
                @guest

                    <ul class="hidden md:flex space-x-7 font-semibold">
                        <li><a href="{{ route('faq') }}"
                                class="text-gray-700 hover:text-slate-100 transition-all duration-200 border border-solid border-amber-500 rounded-md px-5 py-1.5 hover:bg-amber-500">شروط
                                الاستخدام</a>
                        </li>
                        <li><a href="{{ route('contact') }}"
                                class="text-gray-700 hover:text-slate-100 transition-all duration-200 border border-solid border-amber-500 rounded-md px-5 py-1.5 hover:bg-amber-500">اتصل
                                بنا</a>
                        </li>
                        <li><a href="{{ route('auth.login') }}"
                                class="text-slate-100 transition-all duration-200 rounded-md px-5 py-1.5  bg-amber-500 hover:bg-amber-600">تسجيل
                                الدخول</a>
                        </li>


                    </ul>
                @endguest
            </nav>
        </header>

        @if (session('status'))
            <div class="mt-10 rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
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

        <main class="mt-10 md:mt-12 lg:mt-16 shadow-xl p-4 rounded-md">
            {{ $slot }}
        </main>
    </div>
    <footer class="text-slate-600">
        <div
            class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
            <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left md:mt-0 mt-10">
                <a class="flex items-center md:justify-end md:mr-10 justify-center text-gray-900">
                    <img src="{{ asset('images/LOGO-trendy.png') }}" alt="Logo" class="h-14 w-14">

                </a>
                <p class="mt-2 text-sm text-gray-500">منصة لبيع السلع الالكترونية في الجزائر</p>
            </div>
            <div class="flex-grow flex flex-wrap md:pr-20 -mb-10 md:text-left text-center order-first">
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="font-medium text-gray-900 tracking-widest text-lg mb-3">
                        روابط سريعة
                    </h2>
                    <nav class="list-none mb-10 space-y-2">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="{{ route('index') }}">
                                الصفحة الرئيسية
                            </a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="{{ route('faq') }}">شروط
                                الاستخدام</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="{{ route('contact') }}">اتصل بنا</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
