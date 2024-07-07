<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Models\Category_User;
use App\Models\UserResume;
use App\Http\Controllers\AdminController;


// Backend

// Login & Sign Up
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::view('/signup', 'signup')->name('signup');
Route::post('create_user', [AdminController::class, 'create']);


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');
    // Route::get('/admin/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');
    Route::get('/all-cvs', [AdminController::class, 'allCvs'])->name('all_cvs');
    Route::get('backend/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('backend/{user_id}/edit', [AdminController::class, 'edit']);
    Route::get('backend/{user_id}/delete', [AdminController::class, 'delete']);
    Route::put('backend/{user_id}/edit', [AdminController::class, 'update']);
    Route::get('backend/template', [AdminController::class, 'template'])->name('admin.template');
    Route::get('/view-cv/{user_resume_id}', [ResumeController::class, 'viewResume'])->name('view_resume');
    Route::get('/view-resume/{user_resume_id}', [ResumeController::class, 'viewResume'])->name('view_resume');
    Route::get('/view-resume/{user_resume_id}', [ResumeController::class, 'deleteCV'])->name('deleteCV');
});