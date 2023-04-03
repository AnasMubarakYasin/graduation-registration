@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', 'Dashboard')

@section('content')
    <div class="grid gap-4">
        <div class="grid grid-cols-3 gap-4">
            @if ($quota)
                <div
                    class="grid gap-2 p-4 bg-[#31C3B1] dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                        Kuota Wisuda
                    </div>
                    <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                        {{ $quota['total'] }}
                    </div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-[#3A9FCA] dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                        Sisa Kuota                        
                    </div>
                    <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                        {{ $quota['remaining'] }}
                    </div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-green-500 dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                        Total Wisudawan
                    </div>
                    <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                        {{ $quota['filled'] }}
                    </div>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-3 gap-4">
            @if ($registrar)
                <div
                    class="grid gap-2 p-4 bg-[#31C3B1] dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                        {{ __('validate') }}
                    </div>
                    <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                        {{ $registrar['validate'] }}
                    </div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-[#3A9FCA] dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                        {{ __('not yet revision') }}
                    </div>
                    <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                        {{ $registrar['revision'] }}
                    </div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-green-500 dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                        {{ __('revalidate') }}
                    </div>
                    <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                        {{ $registrar['revalidate'] }}
                    </div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-[#31C3B1] dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-white dark:text-gray-200 font-medium capitalize">
                        {{ __('validated') }}
                    </div>
                    <div class="text-4xl text-white dark:text-gray-50 font-semibold">
                        {{ $registrar['validated'] }}
                    </div>
                </div>
            @endif
        </div>
        <div class="text-lg text-gray-700 dark:text-gray-200 font-medium capitalize">
            {{ __('study program') }}
        </div>
        <div class="grid grid-cols-3 gap-4">
            @if ($registrar)
                @foreach ($registrar['study_programs'] as $name => $study_program)
                    <div
                        class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                        <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                            {{ $name }}</div>
                        <div class="text-3xl text-gray-900 dark:text-gray-50 font-semibold">{{ $study_program->count() }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection