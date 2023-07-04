@extends('layouts.master')

@push('title')
    <title>Home</title>
@endpush

@section('main-section')
    <div class="container" style="height: 565px;">
        <div class="d-flex flex-row-reverse">
            <a class="m-1" href="{{ url('/guj') }}">ગુજરાતી</a>
            <a class="m-1" href="{{ url('/ben') }}">বাংলা</a>
            <a class="m-1" href="{{ url('/hi') }}">हिंदी</a>
            <a class="m-1" href="{{ url('/') }}">English</a>
        </div>
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="p-2">
                <h1>@lang('lang.welcome')</h1>
                <p>Laravel 10.0 | PHP 8.0</p>
            </div>
        </div>
    </div>
@endsection
