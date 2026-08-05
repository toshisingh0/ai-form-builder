<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormFieldController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicFormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubmissionController;

use App\Livewire\FormBuilder;
use App\Livewire\SubmissionList;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    // Forms CRUD
    Route::resource('forms', FormController::class);

    // Form Builder
    Route::get('/forms/{form}/builder', FormBuilder::class)
        ->name('forms.builder');

    // Update Field
    Route::put('/fields/{field}', [FormFieldController::class, 'update'])
        ->name('fields.update');

    // Submissions List (Livewire)
    Route::get('/submissions', SubmissionList::class)
        ->name('submissions.index');

    // Export CSV
    Route::get('/forms/{form}/export', [SubmissionController::class, 'export'])
        ->name('forms.export');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Public Form
Route::get('/public/forms/{form}', [PublicFormController::class, 'show'])
    ->name('public.forms.show');

Route::post('/public/forms/{form}', [PublicFormController::class, 'submit'])
    ->name('public.forms.submit');
Route::get('/forms/{form}/submissions', [SubmissionController::class, 'index'])
    ->name('forms.submissions');
require __DIR__.'/auth.php';