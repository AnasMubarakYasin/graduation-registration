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
                    @if ($registrar['biodata'] == 100 && $registrar['file'] == 100)
                        <button data-modal-target="dialog-submit" data-modal-toggle="dialog-submit" type='button'
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Kirim
                        </button>
                    @endif
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
                    <a href="{{ route('student.print.show') }}" onclick="window.open(this.href).print(); return false;"
                        class="w-full text-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                        Cetak
                    </a>
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
                    @if ($registrar['biodata'] == 100 && $registrar['file'] == 100)
                        <button data-modal-target="dialog-submit" data-modal-toggle="dialog-submit" type='button'
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Kirim
                        </button>
                    @endif
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
                </div>
            @else
            @endif
        @endif
       
        <div class="grid grid-cols-3 gap-4">
            @if ($quota && $registrar['biodata'] == 100 && $registrar['file'] == 100)
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
                        {{ (int) $registrar['biodata'] }}%
                    @else
                        {{ 0 }}%
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
                        {{ (int) $registrar['file'] }}%
                    @else
                        {{ 0 }}%
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <div id="dialog-submit" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="dialog-submit">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Data tidak dapat diubah setelah di kirim. <br>
                        Apakah anda yakin ingin mengirim?
                    </h3>
                    <a href="{{ route('student.submit.perform') }}"
                        class="w-full text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Ya
                    </a>
                    <button data-modal-hide="dialog-submit" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
