<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

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

Route::redirect( uri:'/', destination :'login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Admin*/

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth', 'admin')->name('admin');

Route::get('admin/add_staff', [AdminController::class, 'add_staff'])->middleware('auth', 'admin');
Route::post('admin/add_staff', [AdminController::class, 'store_staff'])->middleware('auth', 'admin');

Route::get('admin/staff', [AdminController::class, 'view_staff'])->middleware('auth', 'admin');
Route::get('admin/leaves', [AdminController::class, 'leaves'])->middleware('auth', 'admin');
/**Leave_Type */
Route::get('admin/leave_type', [AdminController::class, 'leave_type'])->middleware('auth', 'admin');
Route::post('admin/leave_type', [AdminController::class, 'leave_store']);
Route::get('admin/edit_leave_type', [AdminController::class, 'leave_edit_view'])->middleware('auth', 'admin');
Route::get('admin/edit_leave_type/{id}', [AdminController::class, 'leave_edit'])->middleware('auth', 'admin');
Route::post('admin/edit_leave_type/{id}', [AdminController::class, 'leave_update'])->middleware('auth', 'admin')->name('edit');
Route::get('admin/leave_type/{id}', [AdminController::class, 'leave_delete'])->middleware('auth', 'admin');


Route::get('admin/pending_leave', [AdminController::class, 'pending_leave'])->middleware('auth', 'admin');
Route::get('admin/approved_leave', [AdminController::class, 'approved_leave'])->middleware('auth', 'admin');
Route::get('admin/rejected_leave', [AdminController::class, 'rejected_leave'])->middleware('auth', 'admin');
/**Leave Details */
Route::POST('admin/leave_details', [AdminController::class, 'leave_details_update'])->middleware('auth', 'admin');
Route::get('admin/leave_details/{id}', [AdminController::class, 'leave_details'])->middleware('auth', 'admin');

/**Department */
Route::get('admin/department', [AdminController::class, 'add_department'])->middleware('auth', 'admin');
Route::post('admin/department', [AdminController::class, 'department_store'])->middleware('auth', 'admin');
Route::get('admin/edit_department/{id}', [AdminController::class, 'department_edit'])->middleware('auth', 'admin');
Route::post('admin/edit_department/{id}', [AdminController::class, 'department_update'])->middleware('auth', 'admin')->name('edit_department');
Route::get('admin/department/{id}', [AdminController::class, 'department_delete'])->middleware('auth', 'admin');

/**Staff */
Route::get('/Staff', [StaffController::class, 'index'])->middleware('auth', 'staff')->name('Staff');
/** apply_leave */
Route::get('staff/apply_leave', [StaffController::class, 'apply_leave'])->middleware('auth', 'staff');
Route::post('staff/apply_leave', [StaffController::class, 'leave_store'])->middleware('auth', 'staff');
/**leave_history */
Route::get('staff/leave_history', [StaffController::class, 'leave_history'])->middleware('auth', 'staff');
/**staff_profile */
Route::get('staff/staff_profile', [StaffController::class, 'staff_profile'])->middleware('auth', 'staff');
/**view_leave */
Route::get('staff/view_leave/{id}', [StaffController::class, 'view_leave'])->middleware('auth', 'staff');

Route::get('Staff/view_staff', [StaffController::class, 'staff'])->middleware('auth', 'staff');

require __DIR__.'/auth.php';
