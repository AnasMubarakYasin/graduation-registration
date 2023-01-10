@extends('layouts.operator.academic.panel', ['content_card' => false])

@section('title', 'Registrar')

@section('content')
    <x-registrar.table :data="$data" :validate="function ($v) {
        return route('operator.academic.registrar.validate', ['registrar' => $v->id]);
    }">
    </x-registrar.table>
@endsection
