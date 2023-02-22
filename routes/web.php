<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SchoolController;
use App\Http\Controllers\UserChoiceController;
use App\Http\Controllers\ExcelCSVController;

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

Route::get('/', function () {
    if(Auth::check()) {
        return view('admin.index');
    }
    else {
        return view('auth.login');
    }
});

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


// User Management All Routes

Route::group(['prefix' => 'users', 'middleware' => ['auth', 'UserTypeRestriction']], function(){
    //Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
    Route::post('/import', [ExcelCSVController::class, 'UsersImportExcelCSV'])->name('users.import');
    Route::get('/export/{slug}', [ExcelCSVController::class, 'UsersExportExcelCSV'])->name('users.export');
});

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
});


// User Profile and Change Password

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function(){
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('profilepassword.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('profilepassword.update');
});


// School Management All Routes

Route::group(['prefix' => 'schools', 'middleware' => ['auth','UserTypeRestriction']], function(){
    Route::get('/view', [SchoolController::class, 'SchoolView'])->name('school.view');
    Route::get('/add', [SchoolController::class, 'SchoolAdd'])->name('school.add');
    Route::post('/store', [SchoolController::class, 'SchoolStore'])->name('school.store');
    Route::get('/edit/{id}', [SchoolController::class, 'SchoolEdit'])->name('school.edit');
    Route::post('/update/{id}', [SchoolController::class, 'SchoolUpdate'])->name('school.update');
    Route::get('/delete/{id}', [SchoolController::class, 'SchoolDelete'])->name('school.delete');
    Route::post('/import', [ExcelCSVController::class, 'SchoolsImportExcelCSV'])->name('schools.import');
    Route::get('/export/{slug}', [ExcelCSVController::class, 'SchoolsExportExcelCSV'])->name('schools.export');
});

// UserChoice Management All Routes

Route::group(['prefix' => 'userchoice', 'middleware' => ['auth']], function(){
    Route::get('/add', [UserChoiceController::class, 'index'])->name('userchoice.add');
    Route::post('/store', [UserChoiceController::class, 'store'])->name('userchoice.store');
    Route::get('/edit', [UserChoiceController::class, 'edit'])->name('userchoice.edit');
    Route::post('/update', [UserChoiceController::class, 'update'])->name('userchoice.update');
});

Route::get('/files', [ExcelCSVController::class, 'index'])->name('files')->middleware(['auth','UserTypeRestriction']);

 


