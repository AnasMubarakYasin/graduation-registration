@extends('layouts.operator.academic.panel', ['content_card' => false])

@section('title', 'Validate Registrar')

@section('content')
    <x-registrar.form-validate :data="$data"></x-registrar.form-validate>
@endsection
