<?php

use App\Http\Controllers\AccessModelController;
use App\Http\Controllers\AccessPointController;
use App\Http\Controllers\AcesssModelController;
use App\Http\Controllers\AcesssPointController;
use App\Http\Controllers\CardioThoraricController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OpertationListController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SurgeryTypeController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'token'])->name('user.token');
Route::get('/admin', [UserController::class, 'token'])->name('user.tokenx');
Route::get('/admin/login', [UserController::class, 'token']);

Route::post('/admin/login', [UserController::class, 'login'])->name('login');
Route::get('/admin/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () { //'CheckAccess'

    // Route::get('/activity-log', [ActivityLogController::class, 'view'])->name('activity-log.view');

    // ----------- Create user -----
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/admin/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    // ------------- Create Access Model-------------
    Route::get('/admin/accessModel', [AccessModelController::class, 'index'])->name('access_model.index');
    Route::post('/admin/accessModel/store', [AccessModelController::class, 'store'])->name('access_model.store');
    // ----------------- end ----------------

    //--------------- Create Access Point ---------
    Route::get('/admin/accessPoint/{id}', [AccessPointController::class, 'index'])->name('access_point.index');
    Route::post('/admin/accessPoint/store', [AccessPointController::class, 'store'])->name('access_point.store');
    // -------------- end -------------

    // -------------- Create PermisionController ----------
    // Route::get('/p', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/admin/permission/{id}', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/admin/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    //  -------------------------- end ------------------------

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('index.dashboard');

     //surgeryType
     Route::get('surgeryType/show', [SurgeryTypeController::class, 'index'])->name('surgeryType.index');
     Route::post('surgeryType/store', [SurgeryTypeController::class, 'save'])->name('surgeryType.store');

    // Route::get('surgery/show', [SurgeryController::class, 'index'])->name('surgery.index');

    Route::get('/cardio', [OpertationListController::class, 'index'])->name('cardio.index');
    Route::get('/search', [OpertationListController::class, 'search'])->name('patient.search');
    Route::post('cardio/save', [OpertationListController::class, 'save'])->name('cardio.save');
});
