@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{ __("You're logged in as Admin!") }}
        </div>
    </div>
@endsection
