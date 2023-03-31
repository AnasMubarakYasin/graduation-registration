<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>Login Student</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col sm:flex-row min-h-screen text-black bg-gray-100 dark:text-white dark:bg-gray-900">
    @error('status')
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Danger</span>
            <div>
                {{ $message }}
            </div>
        </div>
    @enderror
    <section class="bg-white flex flex-col flex-[0_0_60%] gap-10 p-2 sm:p-4 md:p-6 lg:p-8 xl:p-10 2xl:p-12">
        <div class="flex gap-2 items-center">
            <img src="{{ asset('logo.png') }}" alt="UIN Alauddin" class="h-24">
            <h1 class="flex flex-col gap-2">
                <span class="font-semibold text-2xl">
                    Registrasi Wisudawan
                </span>
                <span class="font-semibold text-2xl">
                    Universitas Islam Negeri Makassar
                </span>
            </h1>
        </div>
        <div class="flex gap-2 justify-center">
            <p class="px-8 text-lg leading-8">
                Selamat Datang Di Registrasi Wisudawan Program D3, S1, S2, & S3
                UIN Alauddin Makassar, Halaman Registrasi ini hanya
                diperuntukanbagi mahasiswa yang di telah melaksanakan “Yudisium”
            </p>
        </div>
        <div class="flex gap-2 justify-center">
            <img src="{{ asset('images/login_s1.png') }}" alt="section 1" class="w-[60%]">
        </div>
    </section>
    <form class="grid flex-grow place-items-center py-8 bg-green-500 text-white" action="{{ route('student.login.perform') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid w-[70%] gap-4">
            {{-- <div class="text-xl text-center font-semibold">Login</div> --}}
            <div>
                <label for="nim" class="block mb-2 text-sm font-semibold">NIM</label>
                <input type="text" id="nim" name="nim"
                    class="bg-white text-gray-900 text-sm border-none shadow-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="00000000000" required value="{{ old('nim') }}">
                @error('nim')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-semibold">Password</label>
                <input type="password" id="password" name="password"
                    class="bg-white text-gray-900 text-sm border-none shadow-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="••••••••" required>
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-white rounded border-none shadow-md focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="remember" class="ml-2 text-sm font-semibold">Remember</label>
            </div>
            <button
                class="text-black bg-white border-none shadow-md hover:bg-white focus:ring-4 focus:outline-none focus:ribg-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-white dark:hover:bg-white dark:focus:ribg-white">
                Login
            </button>
            @env('local')
            <div>
                @foreach ($errors->all() as $item)
                    <div>{{ $item }}</div>
                @endforeach
            </div>
            @endenv
        </div>
    </form>
</body>

</html>
