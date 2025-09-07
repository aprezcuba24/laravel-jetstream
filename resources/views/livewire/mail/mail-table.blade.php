@extends('components.layouts.app')

@section('title', __('Mails'))

@section('component')
    <div class="flex justify-end mb-4">
        <a wire:navigate href="{{ route('mails.create') }}">
            <x-button>{{ __('Create') }}</x-button>
        </a>
    </div>
    {{ $slot }}
@endsection
