<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', App::getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>@yield('title', 'Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/layouts/panel/index.js')

    @yield('head')
</head>

<body
    class="grid w-max-[100vw] min-h-screen overflow-hidden text-black bg-gray-100 dark:text-white dark:bg-gray-900 transition-colors content-start">
    <div class="flex min-h-screen">
        <aside id="drawer-main" class="bg-white dark:bg-gray-800 shadow transition-colors" tabindex="-1">
            <header
                class="flex gap-4 items-center justify-center sticky top-0 bg-white dark:bg-gray-800 text-xl font-semibold h-[56px] shadow transition-colors">
                <div><img src="{{ asset('logo.svg') }}" alt="Bladerlaiga" class="w-8 h-8 rounded-md"></div>
                <div class="text-green-700 dark:text-green-500">UIN Alauddin</div>
            </header>
            <nav
                class="flex flex-col h-[calc(100vh_-_56px)] p-4 overflow-auto bg-white dark:bg-gray-800 shadow transition-colors">
                <ul class="space-y-2 capitalize">
                    <li>
                        <a href="{{ route('admin.dashboard.show') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != route('admin.dashboard.show'),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == route('admin.dashboard.show'),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' =>
                                    request()->url() != route('admin.dashboard.show'),
                                '' => request()->url() == route('admin.dashboard.show'),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    {{-- //TODO -  --}}
                    {{-- <li>
                        <button
                            data-dropdown-show="{{ str(request()->url())->startsWith(route('admin.registrar.index')) }}"
                            type="button" @class([
                                'flex items-center w-full p-2 text-base font-normal rounded-lg',
                                'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                    request()->url())->startsWith(route('admin.registrar.index')),
                                'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                    request()->url())->startsWith(route('admin.registrar.index')),
                            ]) aria-controls="menu_registrar"
                            data-collapse-toggle="menu_registrar">
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    route('admin.registrar.index')),
                                '' => str(request()->url())->startsWith(route('admin.registrar.index')),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap capitalize"
                                sidebar-toggle-item>{{ __('registrar') }}</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="menu_registrar" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('admin.registrar.index') }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != route('admin.registrar.index'),
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == route('admin.registrar.index'),
                                ])>
                                    {{ __('all') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.registrar.validate.show') }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != route('admin.registrar.validate.show'),
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == route('admin.registrar.validate.show'),
                                ])>
                                    {{ __('validate') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.registrar.revision.show') }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != route('admin.registrar.revision.show'),
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == route('admin.registrar.revision.show'),
                                ])>
                                    {{ __('not yet revision') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.registrar.revalidate.show') }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != route('admin.registrar.revalidate.show'),
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == route('admin.registrar.revalidate.show'),
                                ])>
                                    {{ __('revalidate') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.registrar.validated.show') }}" @class([
                                    'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                    'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                        request()->url() != route('admin.registrar.validated.show'),
                                    'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                        request()->url() == route('admin.registrar.validated.show'),
                                ])>
                                    {{ __('validated') }}
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="{{ route('admin.quota.index') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                request()->url())->startsWith(route('admin.quota.index')),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                request()->url())->startsWith(route('admin.quota.index')),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    route('admin.quota.index')),
                                '' => str(request()->url())->startsWith(route('admin.quota.index')),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="ml-3">{{ __('quota') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.registrar.index') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                request()->url())->startsWith(route('admin.registrar.index')),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                request()->url())->startsWith(route('admin.registrar.index')),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    route('admin.registrar.index')),
                                '' => str(request()->url())->startsWith(route('admin.registrar.index')),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="ml-3">{{ __('registrar') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faculty.index') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != route('admin.faculty.index'),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == route('admin.faculty.index'),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' =>
                                    request()->url() != route('admin.faculty.index'),
                                '' => request()->url() == route('admin.faculty.index'),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            <span class="ml-3">{{ __('faculty') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.student.index') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                request()->url())->startsWith(route('admin.student.index')),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                request()->url())->startsWith(route('admin.student.index')),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    route('admin.student.index')),
                                '' => str(request()->url())->startsWith(route('admin.student.index')),
                            ]) fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-3">{{ __('student') }}</span>
                        </a>
                    </li>
                </ul>
                <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700 capitalize">
                    <li>
                        {{-- //TODO -  --}}
                        <button type="button" @class([
                            'flex items-center w-full p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' => !str(
                                request()->url())->startsWith(route('admin.user.index')),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' => str(
                                request()->url())->startsWith(route('admin.user.index')),
                        ]) aria-controls="menu_user"
                            data-collapse-toggle="menu_user">
                            <svg xmlns="http://www.w3.org/2000/svg" @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' => !str(request()->url())->startsWith(
                                    route('admin.user.index')),
                                '' => str(request()->url())->startsWith(route('admin.user.index')),
                            ]) fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap capitalize">{{ __('users') }}</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="menu_user"
                            class="py-2 space-y-2 {{ str_starts_with(request()->url(), route('admin.user.index')) ? '' : 'hidden' }}">
                            @foreach (App\Models\UserType::to_array() as $key => $value)
                                <li>
                                    <a href="{{ route('admin.user.' . $key . '.index') }}"
                                        @class([
                                            'flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition group',
                                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                                request()->url() != route('admin.user.' . $key . '.index'),
                                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                                request()->url() == route('admin.user.' . $key . '.index'),
                                        ])>
                                        {{ $value }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.empty.show') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != route('admin.empty.show'),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == route('admin.empty.show'),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' =>
                                    request()->url() != route('admin.empty.show'),
                                '' => request()->url() == route('admin.empty.show'),
                            ]) fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                </path>
                            </svg>
                            <span class="ml-3">{{ __('archive') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.logout.perform') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700',
                        ])>
                            <svg @class(['w-6 h-6 transition text-gray-700 dark:text-white']) fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span class="ml-3">Logout</span>
                        </a>
                    </li>
                </ul>
                <div id="dropdown-cta" class="p-4 mt-4 bg-blue-50 rounded-lg dark:bg-blue-900" role="alert">
                    <div class="flex items-center mb-3">
                        <span
                            class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">
                            Alpha
                        </span>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 inline-flex h-6 w-6 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800"
                            data-collapse-toggle="dropdown-cta" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="mb-3 text-sm text-blue-900 dark:text-blue-400">
                        Preview the Bladerlaiga panel page.
                    </p>
                </div>
                <div class="flex-grow"></div>
                <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="{{ route('admin.empty.show') }}" @class([
                            'flex items-center p-2 text-base font-normal rounded-lg',
                            'dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' =>
                                request()->url() != route('admin.empty.show'),
                            'text-white bg-blue-500 hover:text-black hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700' =>
                                request()->url() == route('admin.empty.show'),
                        ])>
                            <svg @class([
                                'w-6 h-6 transition',
                                'text-gray-700 dark:text-white' =>
                                    request()->url() != route('admin.empty.show'),
                                '' => request()->url() == route('admin.empty.show'),
                            ]) fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <span class="ml-3">About</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <div id="content" class="flex-grow grid h-screen grid-rows-[56px,auto,56px]">
            <header id="header"
                class="flex items-center h-[56px] sticky top-0 bg-white dark:bg-gray-800 shadow transition-colors z-10">
                <div class="flex-grow flex gap-4 items-center px-4">
                    <button id="drawer-btn"
                        class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                        <svg class="w-6 h-6" focusable="false" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 24 24" data-testid="MenuOpenIcon">
                            <path
                                d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z">
                            </path>
                        </svg>
                    </button>
                    <h1 class="text-base font-medium capitalize">@yield('title', 'Panel')</h1>
                </div>
                <div class="flex relative gap-2 items-center pr-4">
                    <button id="notif-btn" data-dropdown-toggle="notif-ddw"
                        class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                        @empty($user->unreadNotifications->all())
                        @else
                            <div class="flex absolute">
                                <div class="inline-flex relative w-3 h-3 left-3 bg-blue-500 rounded-full">
                                </div>
                            </div>
                        @endempty
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>
                    <div id="notif-ddw"
                        class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                        aria-labelledby="notif-btn">
                        <div
                            class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-white rounded-t-md">
                            Notifications
                        </div>
                        <div class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($user->unreadNotifications as $notification)
                                <a href="{{ route($notification->data['route'], ['notification' => $notification]) }}"
                                    class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex-shrink-0">
                                        <img class="w-11 h-11 rounded-full" src="{{ asset('logo.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="pl-3 w-full">
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                                            {{ $notification->data['message'] }}
                                        </div>
                                        <div class="text-xs text-blue-600 dark:text-blue-500">
                                            {{ $notification->created_at->timespan() }}
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-4 text-gray-500 text-lg dark:text-gray-400">
                                    Empty
                                </div>
                            @endforelse
                        </div>
                    @empty($user->unreadNotifications->all())
                    @else
                        <a href="{{ route('admin.dashboard.show') }}"
                            class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                            <div class="inline-flex items-center">
                                View all
                            </div>
                        </a>
                    @endempty
                </div>

                <button id="theme-btn"
                    class="text-sm p-2 text-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                </button>

                <button id="LangButton" data-dropdown-toggle="Lang"
                    class="grid place-content-center gap-2 h-10 aspect-square text-sm text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-600 hover:text-blue-600 dark:hover:text-blue-500 rounded-lg">
                    <span class="sr-only">Open language menu</span>
                    <div class="p-2.5">
                        <div class="font-medium uppercase">{{ App::getLocale() }}</div>
                    </div>
                </button>
                <div id="Lang"
                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="LangDefault">
                        @foreach (['en' => 'English', 'id' => 'Indonesia'] as $key => $value)
                            <li>
                                <a href="{{ route('language.set', ['locale' => $key]) }}"
                                    @class([
                                        'block py-2 px-4 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white',
                                        'text-white bg-blue-500 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' =>
                                            $key == App::getLocale(),
                                    ])>
                                    {{ $value }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <button id="ProfileButton" data-dropdown-toggle="Profile"
                    class="flex items-center gap-2 text-sm font-medium text-gray-900 rounded-lg hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white">
                    <span class="sr-only">Open user menu</span>
                    <div class="bg-gray-100 p-2 rounded-lg dark:bg-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="text-left font-medium dark:text-white">
                        <div class="text-base">{{ $user->name }}</div>
                        <div class="text-xs opacity-70">{{ $user->readable_role }}</div>
                    </div>
                    <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div id="Profile"
                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    {{-- <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                        <div class="font-medium ">{{ $user->name }}</div>
                        <div class="truncate">{{ $user->readable_role }}</div>
                    </div> --}}
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownInformProfileButtonationButton">
                        <li>
                            <a href="{{ route('admin.profile.show') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.notification.show') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Notifications</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.empty.show') }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="{{ route('admin.logout.perform') }}"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Logout
                        </a>
                    </div>
                </div>

            </div>
        </header>
        <main class="flex-grow p-4 overflow-auto">
            @if (isset($content_card) && $content_card)
                <div class="grid gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg shadow transition-colors">
                    @yield('content')
                </div>
            @else
                @yield('content')
            @endif
        </main>
        <footer
            class="flex items-center justify-center h-[56px] bg-white dark:bg-gray-800 shadow transition-colors">
            <div class="text-sm">Copyright &copy; 2022 Bladerlaiga, All Right Reserved.</div>
        </footer>
    </div>
</div>
@yield('body')
</body>

</html>
