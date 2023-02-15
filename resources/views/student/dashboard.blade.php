@extends('layouts.student.panel')

@section('title', 'Dashboard')

@section('content')
    <div class="grid gap-4 items-start">
        @if ($user->registrar)
            @if ($user->registrar->is_validate)
                <div class="grid gap-4 grid-cols-[10fr,2fr] shadow dark:shadow-none transition-colors items-center p-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                    role="alert">
                    <div class="grid gap-2 text-gray-900">
                        <div class="text-2xl font-semibold">Verifikasi Berkas</div>
                        <p class="text-base font-normal">Mohon bersabar, data anda akan di perikasa oleh panitia pendaftaran
                            wisuda UIN Alauddin Makassar.</p>
                    </div>
                </div>
            @elseif ($user->registrar->is_revision)
                <div class="grid gap-4 grid-cols-[10fr,2fr] shadow dark:shadow-none transition-colors items-center p-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <div class="grid gap-2 text-gray-900">
                        <div class="text-2xl font-semibold">Refisi Berkas</div>
                        <p class="text-base font-normal">Data anda tidak dapat diproses, silahkan perbaiki data dan berkas
                            anda.
                        </p>
                        <p class="text-base font-semibold">{{ $registrar['data']['comment'] }}</p>
                    </div>
                    {{-- <a href="{{ route('student.data.show') }}"
                        class="w-full text-white text-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                        Kirim
                    </a> --}}
                </div>
            @elseif ($user->registrar->is_revalidate)
                <div class="grid gap-4 grid-cols-[10fr,2fr] shadow dark:shadow-none transition-colors items-center p-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                    role="alert">
                    <div class="grid gap-2 text-gray-900">
                        <div class="text-2xl font-semibold">Verifikasi Berkas</div>
                        <p class="text-base font-normal">Mohon bersabar, data anda akan di perikasa oleh panitia pendaftaran
                            wisuda UIN Alauddi Makassar.</p>
                    </div>
                </div>
            @elseif ($user->registrar->is_validated)
                <div class="grid gap-4 grid-cols-[10fr,2fr] shadow dark:shadow-none transition-colors items-center p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <div class="grid gap-2 text-gray-900">
                        <div class="text-2xl font-semibold">Berkas Valid</div>
                        <p class="text-base font-normal">Selamat berkas anda dinyatakan valid, anda terdaftar sebagai
                            Wisudawan UIN Alauddin Makassar. Silahakn cetak bukti registrasi anda.</p>
                    </div>
                    <button
                        class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                        Cetak
                    </button>
                </div>
            @elseif ($user->registrar->is_validated)
                <div class="grid grid-cols-3 gap-4">
                    <div class="grid gap-2 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <div class="text-base text-gray-700 dark:text-gray-200 font-medium">Pendaftar Wisuda</div>
                        <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">200 of 1000</div>
                        <div class="w-full h-3 bg-gray-200 rounded-full dark:bg-gray-600">
                            <div class="h-3 bg-blue-500 rounded-full dark:bg-blue-500" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="grid gap-4 grid-cols-[10fr,2fr] shadow dark:shadow-none transition-colors items-center p-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                    role="alert">
                    <div class="grid gap-2 text-gray-900">
                        <div class="text-2xl font-semibold">Kirim Berkas</div>
                        <p class="text-base font-normal">Silahkan mengirimkan berkas anda untuk di validasi oleh panitia
                            pendaftaran
                            wisuda UIN Alauddin Makassar.</p>
                    </div>
                    {{-- <a href="{{ route('student.data.show') }}"
                        class="w-full text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Kirim
                    </a> --}}
                </div>
            @endif
        @else
            @if ($has_quota)
                <div class="grid gap-4 grid-cols-[10fr,2fr] shadow dark:shadow-none transition-colors items-center p-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                    role="alert">
                    <div class="grid gap-2 text-gray-900">
                        <div class="text-2xl font-semibold">Kirim Berkas</div>
                        <p class="text-base font-normal">Silahkan mengirimkan berkas anda untuk di validasi oleh panitia
                            pendaftaran
                            wisuda UIN Alauddin Makassar.</p>
                    </div>
                    {{-- <a href="{{ route('student.data.show') }}"
                        class="w-full text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Kirim
                    </a> --}}
                </div>
            @else
            @endif
        @endif
        <div class="grid grid-cols-3 gap-4">
            @if ($quota)
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        Kuota Wisuda
                    </div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">
                        {{ $quota['total'] }}
                    </div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        Sisa Kuota Wisuda
                    </div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">
                        {{ $quota['remaining'] }}
                    </div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        Total Wisudawan
                    </div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">
                        {{ $quota['filled'] }}
                    </div>
                </div>
            @endif
            <div
                class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                    Kelengkapan Biodata
                </div>
                <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">
                    @isset($registrar['biodata'])
                        {{ (int) $registrar['biodata'] }}
                    @else
                        {{ 0 }}
                    @endisset
                </div>
            </div>
            <div
                class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                    Kelengkapan Berkas
                </div>
                <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">
                    @isset($registrar['file'])
                        {{ (int) $registrar['file'] }}
                    @else
                        {{ 0 }}
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
