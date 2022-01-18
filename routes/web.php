<?php

use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\AcademicResourceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [CommunityController::class, 'viewLandingPage'])->name('index');
Route::get('/book/{id}', [CommunityController::class, 'viewDetail'])->name('detail');

Route::get('/delete-bookmark/{id}', [BookmarksController::class, 'deleteBookmark'])->name('delete-bookmark');

Route::get('/add-bookmark/{id}',[BookmarksController::class, 'addBookmark'])->name('add-bookmark');

Route::get('/login', [CommunityController::class, 'viewloginPage']);
Route::get('/profile', [CommunityController::class, 'viewprofilePage'])->name('dashboard');
Route::get('/home', [CommunityController::class, 'authRedirect']);
Route::get('logouts', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();


    return redirect()->route('index');
})->name('logouts');

Route::get('/uploadjournal',[JournalController::class,'viewUploadJournal']);
Route::get('/editjournal/{id}',[JournalController::class,'editJournal']);
Route::post('/editjournal/{id}',[JournalController::class, 'editJournalP']);
Route::post('/uploadjournal',[JournalController::class, 'submitUploadJournal']);
Route::get('/delete-journal/{id}', [CommunityController::class, 'deleteJournal'])->name('deleteJournal');
Route::get('/journal-content', [CommunityController::class, 'viewJournalContent']);



Route::get('/admin', [StaffController::class, 'viewLandingPage'])->middleware('can:access-as-staff');
Route::get('/account-manager', [StaffController::class, 'viewAccountManager'])->middleware('can:access-as-staff');
Route::get('/content-manager', [StaffController::class, 'viewContentManager'])->middleware('can:access-as-staff');

Route::get('/search', [AcademicResourceController::class, 'search']);

Route::get('/uploadbook', [BookController::class, 'viewUploadBook'])->middleware('can:access-as-staff');
Route::get('/editbook/{id}', [BookController::class, 'editBook'])->middleware('can:access-as-staff');
Route::post('/editbook/{id}', [BookController::class, 'editBookP']);
Route::post('/uploadbook', [BookController::class, 'submitUploadBook']);


Route::get('/bookmarks', [BookmarksController::class, 'viewBookmarkPage']);

Route::get('/project-guidance', function () {
    return view('project-guidance');
});

Route::get('downloadfile', [DownloadFileController::class, 'downloadFile'])->name('download');

Route::get('/add-account', [AdminAccountController::class, 'viewAdminAccount'])->middleware('can:access-as-staff');
Route::post('/add-account', [AdminAccountController::class, 'addAdminAccount'])->name('addAccount');
Route::get('/delete-account/{id}', [AdminAccountController::class, 'deleteAdminAccount'])->name('deleteAccount')->middleware('can:access-as-staff');
Route::get('/delete-content/{id}', [StaffController::class, 'deleteContent'])->name('deleteContent')->middleware('can:access-as-staff');
require __DIR__ . '/auth.php';

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
load');

require __DIR__.'/auth.php';

*/
