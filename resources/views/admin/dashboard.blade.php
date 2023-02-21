@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Dashboard')

@section('content')
    <div class="grid gap-4">
        <div class="grid grid-cols-3 items-start gap-4">
            {{-- @if ($quota)
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        {{ __($quota['name']) }}
                    </div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">
                        {{ __(':current of :total', [
                            'current' => $quota['filled'],
                            'total' => $quota['total'],
                        ]) }}
                    </div>
                    <div class="w-full h-3 bg-gray-100 dark:bg-gray-700 rounded-full">
                        <div class="h-3 bg-blue-500 rounded-full dark:bg-blue-500" style="width: {{ $quota['percent'] }}%">
                        </div>
                    </div>
                    <div class="text-base">{{ __(':day days left', ['day' => $quota['remaining_days']]) }}</div>
                </div>
            @endif --}}
            {{-- <div class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                    {{ __('student') }}</div>
                <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">
                    4000
                </div>
            </div> --}}
        </div>
        <div class="grid grid-cols-3 gap-4">
            @if ($registrar)
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        {{ __('validate') }}</div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">{{ $registrar['validate'] }}</div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        {{ __('not yet revision') }}</div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">{{ $registrar['revision'] }}</div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        {{ __('revalidate') }}</div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">{{ $registrar['revalidate'] }}</div>
                </div>
                <div
                    class="grid gap-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-none border dark:border-gray-700 transition-all">
                    <div class="text-base text-gray-700 dark:text-gray-200 font-medium capitalize">
                        {{ __('validated') }}</div>
                    <div class="text-3xl text-gray-900 dark:text-gray-50 font-normal">{{ $registrar['validated'] }}</div>
                </div>
            @endif
        </div>
    </div>
@endsection
