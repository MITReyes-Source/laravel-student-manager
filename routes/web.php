<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('students.index'));

// --- Authentication ---
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

// --- Protected student manager ---
// "auth" blocks guests entirely (redirect to /login).
// Ownership/admin checks happen inside the controller via $this->authorize(),
// which is enough on its own — the extra ->middleware('can:...') lines below
// are shown commented out as the ROUTE-LEVEL alternative the deck also covers;
// use one approach or the other, not both, to avoid checking twice.
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);

    // Route::put('/students/{student}', [StudentController::class, 'update'])
    //     ->middleware('can:update,student');
    // Route::delete('/students/{student}', [StudentController::class, 'destroy'])
    //     ->middleware('can:delete,student');
});
