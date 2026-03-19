<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/super-admin', function () {
        return ("ini super admin");
        // return view('super_admin.dashboard');
    });
});

Route::middleware(['auth', 'role:admin_pusat'])->group(function () {
    Route::get('/admin-pusat', function () {
        return ("ini admin pusat");
        // return view('admin_pusat.dashboard');
    });
});

Route::middleware(['auth', 'role:admin_cabang'])->group(function () {
    Route::get('/admin-cabang', function () {
        return ("ini admin cabang");
        // return view('admin_cabang.dashboard');
    });
});

require __DIR__.'/auth.php';
