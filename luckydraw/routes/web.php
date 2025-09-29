<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameSessionController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PublicController::class, 'landing'])->name('landing');
Route::get('/privacy', [PublicController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PublicController::class, 'terms'])->name('terms');

// QR Code routes
Route::get('/s/{code}', [ScanController::class, 'show'])->name('scan.show');
Route::post('/s/{code}/enter', [EntryController::class, 'store'])->name('entry.store');
Route::get('/qr/{code}.png', [ScanController::class, 'qrImage'])->name('qr.image');

// Game routes
Route::get('/s/{code}/games', [GameController::class, 'index'])->name('game.selection');
Route::get('/s/{code}/game/{game}', [GameController::class, 'show'])->name('game.show');
Route::get('/api/game/{game}/data', [GameController::class, 'getGameData'])->name('game.data');
Route::get('/api/game/{game}/stats', [GameController::class, 'getStats'])->name('game.stats');

// Game session routes
Route::post('/s/{code}/game/{game}/start', [GameSessionController::class, 'start'])->name('game.session.start');
Route::post('/api/game-session/{sessionId}/update', [GameSessionController::class, 'update'])->name('game.session.update');
Route::post('/api/game-session/{sessionId}/complete', [GameSessionController::class, 'complete'])->name('game.session.complete');
Route::get('/api/game-session/{sessionId}/status', [GameSessionController::class, 'status'])->name('game.session.status');
Route::get('/game/completed/{sessionId}', [GameSessionController::class, 'completed'])->name('game.completed');

// Thanks page
Route::get('/thanks', [ThanksController::class, 'show'])->name('thanks');

// Admin routes (protected)
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // QR Codes management
    Route::resource('qr-codes', App\Http\Controllers\Admin\QrCodeController::class);
    Route::post('qr-codes/generate', [App\Http\Controllers\Admin\QrCodeController::class, 'generate'])->name('qr-codes.generate');
    Route::get('qr-codes/print/{batch?}', [App\Http\Controllers\Admin\QrCodeController::class, 'print'])->name('qr-codes.print');
    
    // Prizes management
    Route::resource('prizes', App\Http\Controllers\Admin\PrizeController::class);
    
    // Entries management
    Route::get('entries', [App\Http\Controllers\Admin\EntryController::class, 'index'])->name('entries.index');
    Route::get('entries/export', [App\Http\Controllers\Admin\EntryController::class, 'export'])->name('entries.export');
    
    // Scans management
    Route::get('scans', [App\Http\Controllers\Admin\ScanController::class, 'index'])->name('scans.index');
    Route::get('scans/export', [App\Http\Controllers\Admin\ScanController::class, 'export'])->name('scans.export');
    
    // Winners management
    Route::resource('winners', App\Http\Controllers\Admin\WinnerController::class);
    Route::post('winners/assign', [App\Http\Controllers\Admin\WinnerController::class, 'assign'])->name('winners.assign');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
