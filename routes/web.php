<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cek-status', \App\Livewire\Validate::class)->name('cek-status');

Route::middleware(['auth', \App\Http\Middleware\ProtectRoute::class])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');

    Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('/', \App\Livewire\Mahasiswa\Index::class)->name('index');
        Route::get('/add', \App\Livewire\Mahasiswa\Create::class)->name('create');
        Route::get('/update/{mahasiswa}', \App\Livewire\Mahasiswa\Update::class)->name('update');
    });

    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/', \App\Livewire\Payment\Index::class)->name('index')->can('admin');
        Route::get('/bayar', \App\Livewire\Payment\Pay::class)->name('pay');
        Route::get('/{mahasiswa}/detail/{payment?}', \App\Livewire\Payment\Detail::class)->name('detail');
        Route::get('/{mahasiswa}', \App\Livewire\Payment\All::class)->name('all');
    });
});

require __DIR__.'/auth.php';

/**
 * TODO
 * 2. Payment index + filter
 * 3. Payment form
 * 4. Payment detail
 * 5. Action approve by admin
 *
 */
