<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\RemarksController;
use App\Models\Survey;
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
    Route::get('/user/orders', [OrderController::class, 'index'])->name('user.orders.index');
    Route::get('/user/orders/add/{id}', [OrderController::class, 'add'])->name('user.orders.add');
    Route::get('/user/orders/edit/{id}', [OrderController::class, 'edit'])->name('user.orders.edit');
    Route::post('/user/orders/update', [OrderController::class, 'update'])->name('user.orders.update');
    Route::get('/user/orders/show', [OrderController::class, 'show'])->name('user.orders.show');
    Route::post('/user/orders/store', [OrderController::class, 'store'])->name('user.orders.store');
    Route::delete('/user/orders/destroy/{id}', [OrderController::class, 'destroy'])->name('user.orders.destroy');

    // All Orders Routes

    // All Survey Routes
    Route::get('/user/survey', [SurveyController::class, 'index'])->name('user.survey.index');
    Route::get('/user/survey/book/{id}', [SurveyController::class, 'book'])->name('user.survey.book');
    Route::post('/user/survey/store', [SurveyController::class, 'store'])->name('user.survey.store');
    Route::get('/user/survey/edit/{id}', [SurveyController::class, 'edit'])->name('user.survey.edit');
    Route::post('/user/survey/update', [SurveyController::class, 'update'])->name('user.survey.update');
    Route::delete('/user/survey/destroy/{id}', [SurveyController::class, 'destroy'])->name('user.survey.destroy');
    // All Survey Routes

    // All Remarks Routes
    Route::get('/user/remarks', [RemarksController::class, 'index'])->name('user.remarks.index');
    Route::get('/user/remarks/customer/{id}', [RemarksController::class, 'customer'])->name('user.remarks.customer');
    Route::post('/user/remarks/store', [RemarksController::class, 'store'])->name('user.remarks.store');
    Route::get('/user/remarks/edit/{id}', [RemarksController::class, 'edit'])->name('user.remarks.edit');
    Route::post('/user/remarks/update', [RemarksController::class, 'update'])->name('user.remarks.update');
    Route::delete('/user/remarks/destroy/{id}', [RemarksController::class, 'destroy'])->name('user.remarks.destroy');
    // All Remarks Routes
});

// Admin Dashboard
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');  // name() chained here
});



require __DIR__ . '/auth.php';
