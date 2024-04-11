<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/invoices', InvoicesController::class);

Route::resource('/sections', sectionsController::class);

Route::resource('/products', ProductsController::class);

Route::get('/section/{id}', [InvoicesController::class, "getproducts"]);

Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, "edit"]);

Route::get("/View_file/{invoice_number}/{file_name}", [InvoicesDetailsController::class, "open_file"]);

Route::get("/download/{invoice_number}/{file_name}", [InvoicesDetailsController::class, "download_file"]);

Route::resource("/InvoiceAttachments", InvoiceAttachmentsController::class);

Route::post("/delete_file", [InvoicesDetailsController::class, "destroy"])->name("delete_file");

Route::get("/edit_invoice/{id}", [InvoicesController::class, "edit"]);

Route::get("/Status_show/{id}", [InvoicesController::class, "show"])->name("Status_show");

Route::post("/Status_Update/{id}", [InvoicesController::class, "Status_Update"])->name('Status_Update');

Route::resource("/Archive", InvoicesController::class);

Route::get("/Invoice_Paid", [InvoicesController::class, "Invoice_Paid"]);

Route::get("/Invoice_UnPaid", [InvoicesController::class, "Invoice_UnPaid"]);

Route::get("/Invoice_Partial", [InvoicesController::class, "Invoice_Partial"]);







Route::get('/{page}', [AdminController::class, 'index']);
