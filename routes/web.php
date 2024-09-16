<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;

// Default route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Resource routes for Companies
Route::resource('companies', CompanyController::class);

// Resource routes for Employees
Route::resource('employees', EmployeeController::class);

// DataTables route for Employees
Route::get('employees/data', [EmployeeController::class, 'getData'])->name('employees.data');
Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');



// DataTables route for Companies (add this if you need it)
Route::get('companies/data', [CompanyController::class, 'index'])->name('companies.data');