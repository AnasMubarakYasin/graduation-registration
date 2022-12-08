@extends('layouts.student.panel', ['content_card' => true])

@section('title', 'File')

@section('content')
    <form class="grid gap-4" action="{{ route('student.file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="munaqasyah">SK Munaqasyah</label>
            <p class="text-sm text-gray-500 dark:text-gray-300" id="munaqasyah_help">
                file dalam bentuk pdf, max 2MB.
            </p>
            <p class="text-sm text-gray-900 dark:text-gray-50">
                {{ $data['munaqasyah'] ? Storage::url($data['munaqasyah']) : '' }}
            </p>
            <input
                class="block w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="munaqasyah_help" id="munaqasyah" name="munaqasyah" type="file">
            @error('munaqasyah')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="certificate">
                Ijazah SMA/SMK/MA
            </label>
            <p class="text-sm text-gray-500 dark:text-gray-300" id="certificate_help">
                file dalam bentuk pdf, max 2MB.
            </p>
            <p class="text-sm text-gray-900 dark:text-gray-50">
                {{ $data['school_certificate'] ? Storage::url($data['school_certificate']) : '' }}
            </p>
            <input
                class="block w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="certificate_help" id="certificate" name="certificate" type="file">
            @error('certificate')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="ktp">Kartu Tanda Pengenal
                (KTP)</label>
            <p class="text-sm text-gray-500 dark:text-gray-300" id="ktp_help">
                Ijazah Yang Telah Dilegalisir dalam bentuk jpg/png, max file 2MB.
            </p>
            <p class="text-sm text-gray-900 dark:text-gray-50">
                {{ $data['ktp'] ? Storage::url($data['ktp']) : '' }}
            </p>
            <input
                class="block w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="ktp_help" id="ktp" name="ktp" type="file">
            @error('ktp')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="kk">Kartu Keluarga
                (KK)</label>
            <p class="text-sm text-gray-500 dark:text-gray-300" id="kk_help">
                file dalam bentuk jpg/png, max 2MB.
            </p>
            <p class="text-sm text-gray-900 dark:text-gray-50">
                {{ $data['kk'] ? Storage::url($data['kk']) : '' }}
            </p>
            <input
                class="block w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="kk_help" id="kk" name="kk" type="file">
            @error('kk')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid gap-2">
            <label class="block text-lg font-medium text-gray-900 dark:text-white" for="spukt">Slip Pembayaran Uang
                Kuliah Tunggal</label>
            <p class="text-sm text-gray-500 dark:text-gray-300" id="spukt_help">
                Slip pembayran terakhir, file dalam bentuk jpg/png, max 2MB.
            </p>
            <p class="text-sm text-gray-900 dark:text-gray-50">
                {{ $data['spukt'] ? Storage::url($data['spukt']) : '' }}
            </p>
            <input
                class="block w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="spukt_help" id="spukt" name="spukt" type="file">
            @error('spukt')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid place-items-center">
            <button
                class="w-full sm:w-1/2 lg:w-1/4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
        </div>
        @env('local')
        <div>
            @foreach ($errors->all() as $item)
                <div>{{ $item }}</div>
            @endforeach
        </div>
        @endenv
    </form>
@endsection
