<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::redirect('/student', '/student/login')->name('student.show');
Route::redirect('/admin', '/admin/login')->name('admin.show');

Route::get('language/{locale}', 'LanguageController@set')->name('language.set');
Route::get('notification/{guard}/{id}', 'NotificationController@read')->name('notification.read');
Route::patch('notification/{guard}/mark_all', 'NotificationController@mark_all')->name('notification.mark_all');
Route::delete('notification/{guard}/{id}', 'NotificationController@delete')->name('notification.delete');
Route::delete('notification/{guard}', 'NotificationController@delete_all')->name('notification.delete_all');

Route::middleware(['authc.guard:student', 'authc.guest:student.dashboard.show'])->group(function () {
    Route::get('student/login', 'StudentController@login_show')->name('student.login.show');
    Route::post('student/login', 'StudentController@login_perfom')->name('student.login.perform');
});
Route::middleware(['authc.guard:student', 'authc.basic:welcome'])->group(function () {
    Route::get('student/dashboard', 'StudentController@dashboard_show')->name('student.dashboard.show');
    Route::get('student/profile', 'StudentController@profile_show')->name('student.profile.show');
    Route::get('student/notification', 'StudentController@notification_show')->name('student.notification.show');
    Route::get('student/about', 'StudentController@about_show')->name('student.about.show');

    Route::get('student/biodata', 'StudentController@biodata_show')->name('student.data.show');
    Route::get('student/file', 'StudentController@file_show')->name('student.file.show');
    Route::get('student/logout', 'StudentController@logout_perfom')->name('student.logout.perform');

    Route::post('student/biodata', 'StudentController@biodata_store')->name('student.data.store');
    Route::post('student/file', 'StudentController@file_store')->name('student.file.store');
});

Route::middleware(['authc.guard:admin', 'authc.guest:admin.dashboard.show'])->group(function () {
    Route::get('admin/login', 'AdminController@login_show')->middleware('use.locale')->name('admin.login.show');
    Route::post('admin/login', 'AdminController@login_perfom')->name('admin.login.perform');
});
Route::middleware(['authc.guard:admin', 'authc.basic:welcome'])->group(function () {
    Route::middleware(['use.locale', 'view.share'])->group(function () {
        Route::get('admin/dashboard', 'AdminController@dashboard_show')->name('admin.dashboard.show');
        Route::get('admin/profile', 'AdminController@profile_show')->name('admin.profile.show');
        Route::get('admin/logout', 'AdminController@logout_perfom')->name('admin.logout.perform');

        Route::get('admin/registrar/validate', 'AdminController@registrar_validate_show')->name('admin.registrar.validate.show');
        Route::get('admin/registrar/revision', 'AdminController@revision')->name('admin.registrar.revision.show');
        Route::get('admin/registrar/revalidate', 'AdminController@revision')->name('admin.registrar.revalidate.show');
        Route::get('admin/registrar/validated', 'AdminController@revision')->name('admin.registrar.validated.show');

        Route::get('admin/registrar', 'RegistrarController@index')->name('admin.registrar.index');
        Route::get('admin/registrar/{registrar}/edit', 'RegistrarController@edit')->name('admin.registrar.edit');

        Route::get('admin/quota', 'QuotaController@index')->name('admin.quota.index');
        Route::get('admin/quota/create', 'QuotaController@create')->name('admin.quota.create');
        Route::get('admin/quota/{quota}/edit', 'QuotaController@edit')->name('admin.quota.edit');

        // Route::get('admin/quota/list', 'AdminController@quota_list_show')->name('admin.quota.list.show');
        // Route::get('admin/quota/create', 'AdminController@quota_create_show')->name('admin.quota.create.show');
        Route::get('admin/quota/edit', 'AdminController@quota_edit_show')->name('admin.quota.edit.show');
        Route::get('admin/faculty', 'AdminController@faculty_show')->name('admin.faculty.show');
        Route::get('admin/student', 'AdminController@student_show')->name('admin.student.show');

        Route::get('admin/archive', 'AdminController@dashboard_show')->name('admin.archive.show');

        Route::get('admin/about', 'AdminController@dashboard_show')->name('admin.about.show');
    });

    Route::post('admin/quota', 'QuotaController@store')->name('admin.quota.store');
    Route::patch('admin/quota/{quota}', 'QuotaController@update')->name('admin.quota.update');
    Route::delete('admin/quota/{quota}', 'QuotaController@destroy')->name('admin.quota.destroy');

    Route::delete('admin/registrar/{registrar}', 'RegistrarController@destroy')->name('admin.registrar.destroy');
});
