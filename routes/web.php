<?php

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
    Route::get('student/login', 'Auth\StudentController@login_show')->name('student.login.show');
    Route::post('student/login', 'Auth\StudentController@login_perform')->name('student.login.perform');
});
Route::middleware(['authc.basic:welcome,student'])->group(function () {
    Route::middleware(['use.locale:id', 'view.share'])->group(function () {
        Route::get('student/dashboard', 'User\StudentController@dashboard_show')->name('student.dashboard.show');
        Route::get('student/profile', 'User\StudentController@profile_show')->name('student.profile.show');
        Route::get('student/notification', 'User\StudentController@notification_show')->name('student.notification.show');
        Route::get('student/about', 'User\StudentController@about_show')->name('student.about.show');

        Route::get('student/biodata', 'User\StudentController@biodata_show')->name('student.data.show');
        Route::get('student/file', 'User\StudentController@file_show')->name('student.file.show');
        Route::get('student/logout', 'Auth\StudentController@logout_perform')->name('student.logout.perform');
    });
    Route::post('student/biodata', 'User\StudentController@biodata_store')->name('student.data.store');
    Route::post('student/file', 'User\StudentController@file_store')->name('student.file.store');
});

Route::middleware(['authc.guard:operator'])->group(function () {
    Route::get('operator/login', 'Auth\OperatorController@login_show')->middleware('use.locale')->name('operator.login.show');
    Route::post('operator/login', 'Auth\OperatorController@login_perfom')->name('operator.login.perform');
    Route::get('operator/logout', 'Auth\OperatorController@logout_perfom')->name('operator.logout.perform');
});
Route::middleware(['authc.basic:welcome,operator'])->group(function () {
    Route::middleware(['use.locale:id', 'view.share'])->group(function () {
        Route::get('operator/academic/dashboard', 'User\Operator\AcademicController@dashboard')->name('operator.academic.dashboard');
        Route::get('operator/academic/empty', 'User\Operator\AcademicController@empty')->name('operator.academic.empty');

        Route::get('operator/academic/registrar', 'User\Operator\AcademicController@registrar')->name('operator.academic.registrar.index');
        Route::get('operator/academic/registrar/{registrar}/validate', 'User\Operator\AcademicController@registrar_validate')->name('operator.academic.registrar.validate');
    });
});

Route::middleware(['authc.guard:administrator', 'authc.guest:admin.dashboard.show'])->group(function () {
    Route::get('admin/login', 'Auth\AdministratorController@login_show')->middleware('use.locale')->name('admin.login.show');
    Route::post('admin/login', 'Auth\AdministratorController@login_perfom')->name('admin.login.perform');
});
Route::middleware(['authc.basic:welcome,administrator'])->group(function () {
    Route::middleware(['use.locale', 'view.share'])->group(function () {
        Route::get('admin/dashboard', 'User\AdministratorController@dashboard_show')->name('admin.dashboard.show');
        Route::get('admin/profile', 'User\AdministratorController@profile_show')->name('admin.profile.show');
        Route::get('admin/notification', 'User\AdministratorController@notification_show')->name('admin.notification.show');
        Route::get('admin/empty', 'User\AdministratorController@empty_show')->name('admin.empty.show');
        Route::get('admin/logout', 'Auth\AdministratorController@logout_perfom')->name('admin.logout.perform');

        Route::get('admin/archive', 'User\AdministratorController@dashboard_show')->name('admin.archive.show');
        Route::get('admin/about', 'User\AdministratorController@dashboard_show')->name('admin.about.show');

        // Route::get('admin/registrar/validate', 'User\AdministratorController@registrar_validate_show')->name('admin.registrar.validate.show');
        // Route::get('admin/registrar/revision', 'User\AdministratorController@revision')->name('admin.registrar.revision.show');
        // Route::get('admin/registrar/revalidate', 'User\AdministratorController@revision')->name('admin.registrar.revalidate.show');
        // Route::get('admin/registrar/validated', 'User\AdministratorController@revision')->name('admin.registrar.validated.show');

        Route::get('admin/quota', 'QuotaController@index')->name('admin.quota.index');
        Route::get('admin/quota/create', 'QuotaController@create')->name('admin.quota.create');
        Route::get('admin/quota/{quota}/edit', 'QuotaController@edit')->name('admin.quota.edit');

        Route::get('admin/student', 'StudentController@index')->name('admin.student.index');
        Route::get('admin/student/create', 'StudentController@create')->name('admin.student.create');
        Route::get('admin/student/{student}/edit', 'StudentController@edit')->name('admin.student.edit');

        Route::get('admin/faculty', 'FacultyController@index')->name('admin.faculty.index');
        Route::get('admin/faculty/create', 'FacultyController@create')->name('admin.faculty.create');
        Route::get('admin/faculty/{faculty}/edit', 'FacultyController@edit')->name('admin.faculty.edit');
    });
    Route::post('admin/quota', 'QuotaController@store')->name('admin.quota.store');
    Route::patch('admin/quota/{quota}', 'QuotaController@update')->name('admin.quota.update');
    Route::delete('admin/quota/{quota}', 'QuotaController@destroy')->name('admin.quota.destroy');

    Route::post('admin/student', 'StudentController@store')->name('admin.student.store');
    Route::patch('admin/student/{student}', 'StudentController@update')->name('admin.student.update');
    Route::delete('admin/student/{student}', 'StudentController@destroy')->name('admin.student.destroy');

    Route::post('admin/faculty', 'FacultyController@store')->name('admin.faculty.store');
    Route::patch('admin/faculty/{faculty}', 'FacultyController@update')->name('admin.faculty.update');
    Route::delete('admin/faculty/{faculty}', 'FacultyController@destroy')->name('admin.faculty.destroy');
});

Route::middleware(['authc.basic:welcome,administrator,operator'])->group(function () {
    Route::middleware('view.share')->group(function () {
        Route::get('resources/registrar', 'RegistrarController@index')->name('resources.registrar.index');
        Route::get('resources/registrar/create', 'RegistrarController@create')->name('resources.registrar.create');
        Route::get('resources/registrar/{registrar}/edit', 'RegistrarController@edit')->name('resources.registrar.edit');
        Route::get('resources/registrar/{registrar}/validate', 'RegistrarController@show_validate')->name('resources.registrar.show_validate');
    });
    Route::post('resources/registrar', 'RegistrarController@store')->name('resources.registrar.store');
    Route::patch('resources/registrar/{registrar}', 'RegistrarController@update')->name('resources.registrar.update');
    Route::post('resources/registrar/{registrar}/validate', 'RegistrarController@perform_validate')->name('resources.registrar.perform_validate');
    Route::delete('resources/registrar/{registrar}', 'RegistrarController@destroy')->name('resources.registrar.destroy');
});
