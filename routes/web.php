<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

// 1. La raíz '/' carga la vista de Inicio
Route::inertia('/', 'site/Inicio')->name('home');

// 2. La ruta '/login' carga tu componente pages/auth/Login.vue
Route::inertia('/login', 'auth/Login')->name('login');

// Rutas de tu sitio
Route::inertia('/nosotros', 'site/Nosotros')->name('nosotros');
Route::inertia('/pastores', 'site/Pastores')->name('pastores');
Route::inertia('/iglesias', 'site/Iglesias')->name('iglesias');
Route::inertia('/eventos', 'site/Eventos')->name('eventos');
Route::inertia('/escuela-biblica', 'site/EscuelaBiblica')->name('escuela-biblica');
Route::inertia('/testimonios', 'site/Testimonios')->name('testimonios');
Route::inertia('/jovenes', 'site/Jovenes')->name('jovenes');
Route::inertia('/ministerios', 'site/Ministerios')->name('ministerios');

// Dashboard autenticado
Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::post('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
    Route::delete('invitations/{invitation}', [TeamInvitationController::class, 'decline'])->name('invitations.decline');
});

if (file_exists(__DIR__.'/settings.php')) {
    require __DIR__.'/settings.php';
}
