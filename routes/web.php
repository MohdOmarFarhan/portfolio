<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get("/", [HomeController::class, "homePage"])->name("homepage");



Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get("/admin/dashboard", [AdminController::class, "adminDashboard"])->name("admin.dashboard");


});

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get("/user/dashboard", [UserController::class, "UserDashboard"])->name("user.dashboard");


});








Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
