<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestAmazonSes;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\CdfScholarshipController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CdfAdminController;
use App\Http\Controllers\Admin\UniversityAdminController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));
Route::get('/faqs', fn() => view('frequently_asked_quix'));
Route::get('/privacy', [TermsController::class, 'privacy'])->name('privacy');
Route::get('/apply', [HomeController::class, 'apply'])->name('apply');
Route::get('/print/{serial}', [HomeController::class, 'download'])->name('print');
Route::get('/student', [HomeController::class, 'student'])->name('student');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/test', function () {
    Mail::to('nduatishem@gmail.com')->send(new TestAmazonSes('It works!'));
    return 'Mail sent!';
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| User Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // University Scholarship
    Route::get('/scholarship', [ScholarshipController::class, 'showForm'])->name('scholarship.form');
    Route::post('/scholarship', [ScholarshipController::class, 'submitForm'])->name('scholarship.submit');
    Route::get('/scholarship/view/{id}', [ScholarshipController::class, 'viewApplication'])
        ->where('id', '[0-9]+')->name('scholarship.view');

    // CDF High School Scholarship
    Route::get('/cdf', [CdfScholarshipController::class, 'index'])->name('scholarship.cdf');
    Route::post('/cdf/submit', [CdfScholarshipController::class, 'submit'])->name('scholarship.cdf.submit');
    Route::get('/cdfview/{id}', [CdfScholarshipController::class, 'view'])
        ->where('id', '[0-9]+')->name('scholarship.cdf.view');

    // Application Status
    Route::get('/status', [ScholarshipController::class, 'showStatus'])->name('status');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // CDF Applications
    Route::get('/cdf', [CdfAdminController::class, 'index'])->name('admin.cdf.index');
    Route::get('/cdf/{id}', [CdfAdminController::class, 'view'])->where('id', '[0-9]+')->name('admin.cdf.view');
    Route::post('/cdf/{id}/update', [CdfAdminController::class, 'update'])->where('id', '[0-9]+')->name('admin.cdf.update');
    Route::get('/cdf/generate-report/{format?}', [CdfAdminController::class, 'generateReport'])->name('admin.cdf.generate-report');
    Route::get('/cdf/analysis', [CdfAdminController::class, 'analysis'])->name('admin.cdf.analysis');

    // University Applications
    Route::get('/university', [UniversityAdminController::class, 'index'])->name('admin.university.index');
    Route::get('/university/{id}', [UniversityAdminController::class, 'view'])->where('id', '[0-9]+')->name('admin.university.view');
    Route::post('/university/{id}/update', [UniversityAdminController::class, 'update'])->where('id', '[0-9]+')->name('admin.university.update');
    Route::get('/university/generate-report/{format?}', [UniversityAdminController::class, 'generateReport'])->name('admin.university.generate-report');
    Route::get('/university/analysis', [UniversityAdminController::class, 'analysis'])->name('admin.university.analysis');
});
