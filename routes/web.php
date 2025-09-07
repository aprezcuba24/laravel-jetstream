<?php

use App\Livewire\Mail\MailTable;
use App\Livewire\Mail\CreateMail;
use App\Livewire\UsersTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users', UsersTable::class)
        ->name('users')
        ->middleware('role:Admin')
    ;
    Route::get('/mails', MailTable::class)
        ->name('mails')
    ;
    Route::get('/mails/create', CreateMail::class)
        ->name('mails.create')
    ;
});
