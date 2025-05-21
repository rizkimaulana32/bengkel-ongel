<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\SparePartController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\User\AppointmentControllerUser;
use App\Http\Controllers\Admin\ItemsOrderedController;
use App\Http\Controllers\CartController;

Route::get('/', [SparePartController::class, 'homepage'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/client/dashboard', [UserController::class, 'index'])->name('client.dashboard');
    Route::get('/cart/create/{id}', [UserController::class, 'createCart'])->name('cart.create');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/sparepart/{id}', [SparePartController::class, 'details'])->name('sparepart.details');
    
    Route::get('/client/appointment', [AppointmentControllerUser::class, 'index'])->name('client.appointment.index');
    Route::post('/client/appointment', [AppointmentControllerUser::class, 'store'])->name('client.appointment.store');
    Route::get('/client/appointment/ordereditems/{id}', [AppointmentControllerUser::class, 'ordered'])->name('client.appointment.ordered');
    Route::get('/client/appointment/create', [AppointmentControllerUser::class, 'create'])->name('client.appointment.create');
    Route::get('/client/appointment/{id}/view', [AppointmentControllerUser::class, 'view'])->name('client.appointment.view');
    Route::get('/client/appointment/{id}/edit', [AppointmentControllerUser::class, 'edit'])->name('client.appointment.edit');
    Route::patch('/client/appointment/update', [AppointmentControllerUser::class, 'update'])->name('client.appointment.update');
    Route::delete('/client/appointment/{appointments}', [AppointmentControllerUser::class, 'destroy'])->name('client.appointment.destroy');

});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/spare_parts', [SparePartController::class, 'index'])->name('admin.spare_parts.index');
    Route::get('/admin/spare_parts/create', [SparePartController::class, 'create'])->name('admin.spare_parts.create');
    Route::post('/admin/spare_parts', [SparePartController::class, 'store'])->name('admin.spare_parts.store');
    Route::get('/admin/spare_parts/{sparePart}/edit', [SparePartController::class, 'edit'])->name('admin.spare_parts.edit');
    Route::get('/admin/spare_parts/{id}/view', [SparePartController::class, 'view'])->name('admin.spare_parts.view');
    Route::patch('/admin/spare_parts/{sparePart}', [SparePartController::class, 'update'])->name('admin.spare_parts.update');
    Route::delete('/admin/spare_parts/{sparePart}', [SparePartController::class, 'destroy'])->name('admin.spare_parts.destroy');

    Route::get('/admin/appointment', [AppointmentController::class, 'index'])->name('admin.appointment.index');
    Route::get('/admin/appointment/create', [AppointmentController::class, 'create'])->name('admin.appointment.create');
    Route::post('/admin/appointment', [AppointmentController::class, 'store'])->name('admin.appointment.store');
    Route::get('/admin/appointment/{id}/view', [AppointmentController::class, 'view'])->name('admin.appointment.view');
    Route::get('/admin/appointment/{id}/edit', [AppointmentController::class, 'edit'])->name('admin.appointment.edit');
    Route::patch('/admin/appointment/update/{id}', [AppointmentController::class, 'update'])->name('admin.appointment.update');
    Route::patch('/admin/appointment/{id}/done', [AppointmentController::class, 'done'])->name('admin.appointment.done');
    Route::delete('/admin/appointment/{appointments}', [AppointmentController::class, 'destroy'])->name('admin.appointment.destroy');
    
    Route::get('/admin/item_ordered', [ItemsOrderedController::class, 'index'])->name('admin.item_ordered.index');
    Route::get('/admin/item_ordered/spareparts', [ItemsOrderedController::class, 'spareparts'])->name('admin.item_ordered.spareparts');
    Route::get('/admin/item_ordered/{appointmentId}/appointment', [ItemsOrderedController::class, 'indexAppointment'])->name('admin.item_ordered.indexappointment');
    Route::get('/admin/item_ordered/select', [ItemsOrderedController::class, 'selectUser'])->name('admin.item_ordered.selectuser');
    Route::get('/admin/item_ordered/create/{id}', [ItemsOrderedController::class, 'create'])->name('admin.item_ordered.create');
    Route::post('/admin/item_ordered', [ItemsOrderedController::class, 'store'])->name('admin.item_ordered.store');
    Route::get('/admin/item_ordered/{id}/view', [ItemsOrderedController::class, 'view'])->name('admin.item_ordered.view');
    Route::get('/admin/item_ordered/{id}/edit', [ItemsOrderedController::class, 'edit'])->name('admin.item_ordered.edit');
    Route::patch('/admin/item_ordered/{id}', [ItemsOrderedController::class, 'update'])->name('admin.item_ordered.update');
    Route::delete('/admin/item_ordered/{itemsorder}', [ItemsOrderedController::class, 'destroy'])->name('admin.item_ordered.destroy');
    
    Route::get('/sparepart/admin/{id}', [SparePartController::class, 'detailsAdmin'])->name('admin.spare_parts.details');
});
