<!-- resources/views/dashboard.blade.php -->
@extends('layouts.master')

@section('title', '管理后台')

@section('content')
    欢迎访问laravel学院后台
@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection