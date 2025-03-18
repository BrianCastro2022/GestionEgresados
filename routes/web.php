<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Livewire\Auth\ResetPassword; // Importación del componente Livewire
use Livewire\Livewire;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rutas de verificación de correo
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Correo de verificación reenviado.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Rutas para recuperación de contraseña
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

// Ruta para restablecimiento de contraseña con Livewire
Route::get('/reset-password/{token}', function ($token) {
    return Livewire::mount(ResetPassword::class, ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

// Rutas protegidas por roles
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Coordinador de Egresados'])->group(function () {
    Route::get('/coordinador', function () {
        return view('coordinador.dashboard');
    })->name('coordinador.dashboard');
});

Route::middleware(['auth', 'role:Egresado'])->group(function () {
    Route::get('/egresado', function () {
        return view('egresado.dashboard');
    })->name('egresado.dashboard');
});

require __DIR__.'/auth.php';
