@extends('layouts.app')

@section('header')
  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Dashboard') }}
  </h2>
@endsection

@section('content')
  <div class="py-2">
    <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
      <x-welcome />
    </div>
  </div>
@endsection
