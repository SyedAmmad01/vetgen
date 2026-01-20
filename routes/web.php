<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryController;
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

// User Dashboard
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');  // name() chained here

    // All Queries Routes
    Route::get('/user/queries', [QueryController::class, 'index'])->name('user.queries.index');
    // All Queries Routes

     // All Orders Routes
    Route::get('/user/orders/add/{id}', [OrderController::class, 'add'])->name('user.orders.add');
    Route::get('/user/orders/show', [OrderController::class, 'show'])->name('user.orders.show');
    Route::post('/user/orders/store', [OrderController::class, 'store'])->name('user.orders.store');
    Route::get('/user/survey/book_survey/{id}', [OrderController::class, 'book_survey'])->name('user.orders.book_survey');
    Route::post('/user/survey/survey_store', [OrderController::class, 'survey_store'])->name('user.orders.survey_store');
    Route::get('/user/remarks/customer_remarks/{id}', [OrderController::class, 'customer_remarks'])->name('user.remarks.customer_remarks');
    Route::post('/user/remarks/remarks_store', [OrderController::class, 'remarks_store'])->name('user.remarks.remarks_store');
    // All Orders Routes
});

// Admin Dashboard
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');  // name() chained here
});



require __DIR__ . '/auth.php';
