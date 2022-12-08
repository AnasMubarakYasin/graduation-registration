@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Edit Registrar')
@section('head')
@endsection

@section('content')
    <div class="grid gap-4">

        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.show') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Admin
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('admin.registrar.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Registrar
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                            Edit
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        <form
            class="grid gap-4 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700"
            action="" method="post">
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name" name="name" value="{{ $data['name'] ?? old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Name">
                </div>
                <div>
                    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                    <input type="text" id="nim" name="nim" value="{{ $data['nim'] ?? old('nim') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your NIM">
                </div>
                <div>
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ $data['nik'] ?? old('nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your NIK">
                </div>
                <div>
                    <label for="pob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of
                        Birth</label>
                    <input type="text" id="pob" name="pob" value="{{ $data['pob'] ?? old('pob') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Place of Birth">
                </div>
                <div>
                    <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
                        Birth</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker type="text" id="dob" name="dob"
                            value="{{ $data['dob'] ?? old('dob') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Date of Birth">
                    </div>
                </div>
                <div>
                    <label for="faculty"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Faculty</label>
                    <select id="faculty" name="faculty"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Faculty</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div>
                    <label for="study_program" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Study Program
                    </label>
                    <select id="study_program" name="study_program"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Study Program</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div>
                    <label for="ipk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IPK</label>
                    <input type="number" id="ipk" name="ipk" step=".1" max="4" min="0"
                        value="{{ $data['ipk'] ?? old('ipk') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your IPK">
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="munaqasyah">
                            Munaqasyah
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="munaqasyah_help">
                            file dalam bentuk pdf, max 2MB.
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="munaqasyah" type="file">
                    </div>
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['munaqasyah'])
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ Storage::url($data['munaqasyah']) }}" alt="">
                        @else
                            <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col gap-2 flex-grow">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="school_certificate">
                            Ijazah SMA/SMK/MA
                        </label>
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="school_certificate_help">
                            file dalam bentuk pdf, max 2MB.
                        </p>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="school_certificate" type="file">
                    </div>
                    <div
                        class="grid place-content-center h-full aspect-square bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg">
                        @isset($data['school_certificate'])
                            <img id="photo_preview" class="w-[9rem] aspect-square object-cover object-center text-gray-400"
                                src="{{ Storage::url($data['school_certificate']) }}" alt="">
                        @else
                            <svg id="photo_preview" class="w-full aspect-square text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        @endisset
                    </div>
                </div>
                {{-- <div class="grid gap-2">
                    <label class="block text-lg font-medium text-gray-900 dark:text-white" for="munaqasyah">SK
                        Munaqasyah</label>
                    <p class="text-sm text-gray-500 dark:text-gray-300" id="munaqasyah_help">
                        file dalam bentuk pdf, max 2MB.
                    </p>
                    <p class="text-sm text-gray-900 dark:text-gray-50 break-all">
                        {{ $data['munaqasyah'] ? Storage::url($data['munaqasyah']) : '' }}
                    </p>
                    <input
                        class="block w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="munaqasyah_help" id="munaqasyah" name="munaqasyah" type="file">
                    @error('munaqasyah')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div> --}}
                {{-- <div class="grid gap-2">
                    <label class="block text-lg font-medium text-gray-900 dark:text-white" for="certificate">
                        Ijazah SMA/SMK/MA
                    </label>
                    <p class="text-sm text-gray-500 dark:text-gray-300" id="certificate_help">
                        file dalam bentuk pdf, max 2MB.
                    </p>
                    <p class="text-sm text-gray-900 dark:text-gray-50 break-all">
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
                    <label class="block text-lg font-medium text-gray-900 dark:text-white" for="ktp">Kartu Tanda
                        Pengenal
                        (KTP)</label>
                    <p class="text-sm text-gray-500 dark:text-gray-300" id="ktp_help">
                        Ijazah Yang Telah Dilegalisir dalam bentuk jpg/png, max file 2MB.
                    </p>
                    <p class="text-sm text-gray-900 dark:text-gray-50 break-all">
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
                    <p class="text-sm text-gray-900 dark:text-gray-50 break-all">
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
                    <label class="block text-lg font-medium text-gray-900 dark:text-white" for="spukt">Slip Pembayaran
                        Uang
                        Kuliah Tunggal</label>
                    <p class="text-sm text-gray-500 dark:text-gray-300" id="spukt_help">
                        Slip pembayran terakhir, file dalam bentuk jpg/png, max 2MB.
                    </p>
                    <p class="text-sm text-gray-900 dark:text-gray-50 break-all">
                        {{ $data['spukt'] ? Storage::url($data['spukt']) : '' }}
                    </p>
                    <input
                        class="block w-min text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="spukt_help" id="spukt" name="spukt" type="file">
                    @error('spukt')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div> --}}
            </div>
            <div class="grid place-items-center">
                <button
                    class="w-full sm:w-1/2 lg:w-1/4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>

    </div>
@endsection
