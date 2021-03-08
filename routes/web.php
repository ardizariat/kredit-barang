<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{KreditController, BarangController,KategoriController,PelangganController, DashboardController,ExportController,BayarCicilanController, CashController, LaporanController, ProfileController,SupplierController,UserController};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;


Route::post('/logout', [LoginController::class,'logout'])->name('logout');
Auth::routes();

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/pelanggan', [HomeController::class,'pelanggan'])->name('pelanggan');
Route::post('/pelanggan', [HomeController::class,'cek'])->name('cek');
Route::get('/cetak-riwayat/{transaksi}', [HomeController::class,'pdf'])->name('cetak.riwayat.kredit');





Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' => 'auth'], function () {
    //---------------------------------- Profile User ----------------------------------//
    Route::get('/my-profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::get('/update-password', [ProfileController::class, 'editPassword'])->name('edit.password');
    Route::patch('/update-profile/{user}', [ProfileController::class, 'update'])->name('update.profile');
    Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
});


Route::group(['middleware' => ['role:super-admin|admin','auth', 'permission:full-permission|create|read|update']], function () {
//---------------------------------- Dashboard -------------------------------//
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

  //---------------------------------- Kategori ----------------------------------//
  Route::get('admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
  Route::get('admin/kategori/datatable', [KategoriController::class, 'datatable'])->name('admin.kategori.datatable');
  Route::post('admin/kategori/store', [KategoriController::class, 'store'])->name('admin.kategori.store');
  Route::get('admin/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
  Route::patch('admin/kategori/{kategori}/update', [KategoriController::class, 'update'])->name('admin.kategori.update');
  Route::delete('admin/kategori/{kategori}/delete', [KategoriController::class, 'delete'])->name('admin.kategori.delete');

  //---------------------------------- Kategori ----------------------------------//

  //---------------------------------- Supplier ----------------------------------//
  Route::get('admin/supplier', [SupplierController::class, 'index'])->name('admin.supplier');
  Route::get('admin/supplier/datatable', [SupplierController::class, 'datatable'])->name('admin.supplier.datatable');
  Route::get('admin/supplier/{supplier}', [SupplierController::class, 'show'])->name('admin.supplier.show');
  Route::post('admin/supplier/', [SupplierController::class, 'store'])->name('admin.supplier.store');
  Route::get('admin/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('admin.supplier.edit');
  Route::patch('admin/supplier/{supplier}/update', [SupplierController::class, 'update'])->name('admin.supplier.update');
  Route::delete('admin/supplier/{supplier}/delete', [SupplierController::class, 'destroy'])->name('admin.supplier.delete');
  //---------------------------------- Supplier ----------------------------------//

  //---------------------------------- Barang ----------------------------------//
  Route::get('admin/barang', [BarangController::class, 'index'])->name('admin.barang');
  Route::get('admin/barang/datatable', [BarangController::class, 'datatable'])->name('admin.barang.datatable');
  Route::get('admin/barang/create', [BarangController::class, 'create'])->name('admin.barang.create');
  Route::get('admin/barang/pdf', [BarangController::class, 'exportPdf'])->name('admin.barang.pdf');
  Route::get('admin/barang/excel', [BarangController::class, 'exportExcel'])->name('admin.barang.excel');
  Route::post('admin/barang/', [BarangController::class, 'store'])->name('admin.barang.store');
  Route::get('admin/barang/{barang:slug}/', [BarangController::class, 'show'])->name('admin.barang.show');
  Route::get('admin/barang/{barang}/edit', [BarangController::class, 'edit'])->name('admin.barang.edit');
  Route::patch('admin/barang/{barang}/update', [BarangController::class, 'update'])->name('admin.barang.update');
  Route::delete('admin/barang/{barang}/delete', [BarangController::class, 'delete'])->name('admin.barang.delete');
  //---------------------------------- Barang ----------------------------------//

  //---------------------------------- Pelanggan ----------------------------------//
  Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan');
  Route::get('/admin/pelanggan/datatable', [PelangganController::class, 'datatable'])->name('admin.pelanggan.datatable');
  Route::get('/admin/pelanggan/create', [PelangganController::class, 'create'])->name('admin.pelanggan.create');
  Route::post('/admin/pelanggan/store', [PelangganController::class, 'store'])->name('admin.pelanggan.store');
  Route::get('/admin/pelanggan/{pelanggan}', [PelangganController::class, 'show'])->name('admin.pelanggan.show');
  Route::get('/admin/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
  Route::patch('/admin/pelanggan/{pelanggan}/update', [PelangganController::class, 'update'])->name('admin.pelanggan.update');
  Route::delete('/admin/pelanggan/{pelanggan}/delete', [PelangganController::class, 'delete'])->name('admin.pelanggan.delete');
  //---------------------------------- Pelanggan ----------------------------------//


    //---------------------------------- Transaksi Kredit ----------------------------------//
    Route::get('/admin/transaksi-kredit', [KreditController::class, 'index'])->name('admin.transaksi.kredit');
    Route::get('/admin/transaksi-kredit/datatable', [KreditController::class, 'datatable'])->name('admin.transaksi.kredit.datatable');
    Route::get('/admin/transaksi-kredit/create', [KreditController::class, 'create'])->name('admin.transaksi.kredit.create');
    Route::post('/admin/transaksi-kredit', [KreditController::class, 'store'])->name('admin.transaksi.kredit.store');    
    Route::get('/admin/transaksi-kredit/create-pelanggan', [KreditController::class, 'getPelanggan'])->name('admin.transaksi.kredit.create.pelanggan');
    Route::get('/admin/transaksi-kredit/create-barang', [KreditController::class, 'getBarang'])->name('admin.transaksi.kredit.create.barang');
    Route::get('/admin/pelanggan-kredit/{transaksi}', [KreditController::class, 'show'])->name('admin.pelanggan.kredit');
    Route::delete('/admin/transaksi-kredit/{id}', [KreditController::class, 'deleteTransaksiKredit'])->name('admin.transaksi.kredit.delete');
    Route::post('/admin/bayar-kredit', [KreditController::class, 'bayar'])->name('admin.bayar.kredit');
    Route::get('/admin/transaksi-kredit/laporan', [KreditController::class, 'laporan'])->name('admin.transaksi.kredit.laporan');
    Route::get('/admin/transaksi-kredit/laporan/filter', [KreditController::class, 'filterLaporan'])->name('admin.transaksi.kredit.filter.laporan');

    //---------------------------------- Transaksi Kredit ----------------------------------//

    //------------------- Bayar Langsung Transaksi Kredit ----------------------------------//
    Route::get('/admin/bayar-kredit', [BayarCicilanController::class, 'index'])->name('admin.bayar.kredit');
    Route::get('/admin/get-pelanggan', [BayarCicilanController::class, 'pelanggan'])->name('admin.pelanggan.get');
    Route::post('/admin/bayar-cicilan', [BayarCicilanController::class, 'store'])->name('admin.bayar.cicilan');
    //------------------- Bayar Langsung Transaksi Kredit ----------------------------------//

    //---------------------------------- Transaksi Tunai ----------------------------------//
    Route::get('/admin/transaksi-tunai', [CashController::class, 'index'])->name('admin.transaksi.tunai');
    Route::get('/admin/transaksi-tunai/datatable', [CashController::class, 'datatable'])->name('admin.transaksi.tunai.datatable');
    Route::get('/admin/transaksi-tunai/create', [CashController::class, 'create'])->name('admin.transaksi.tunai.create');
    Route::get('/admin/transaksi-tunai/get-barang', [CashController::class, 'getBarang'])->name('admin.transaksi.tunai.create.barang');
    
    Route::post('/admin/transaksi-tunai', [CashController::class, 'store'])->name('admin.transaksi.tunai.store');
    //---------------------------------- Transaksi Tunai ----------------------------------//

    //-------------------------------- Laporan Transaksi Tunai --------------------------------//
    Route::get('/admin/transaksi-tunai/all', [LaporanController::class, 'transaksiCash'])->name('admin.transaksi.tunai.all');
    Route::get('/admin/transaksi-tunai/export', [LaporanController::class, 'transaksiCashExport'])->name('admin.transaksi.tunai.export');   
    Route::get('/admin/transaksi-tunai/pelanggan/export', [LaporanController::class, 'transaksiTunaiPelangganExport'])->name('admin.transaksi.tunai.pelanggan.export');    
    Route::get('/admin/transaksi-tunai/pelanggan/{id}/nota', [LaporanController::class, 'transaksiTunaiPelangganNota'])->name('admin.transaksi.tunai.pelanggan.nota');    
    //-------------------------------- Laporan Transaksi Tunai ------------------------------//

    //-------------------------- Laporan Transaksi Kredit --------------------------------//
    Route::get('/admin/transaksi-kredit/pdf', [LaporanController::class, 'transaksiKreditPdf'])->name('admin.transaksi.kredit.pdf');
    Route::get('/admin/transaksi-kredit/all', [LaporanController::class, 'transaksiKredit'])->name('admin.transaksi.kredit.all');
    Route::get('/admin/transaksi-kredit/export', [LaporanController::class, 'transaksiKreditExport'])->name('admin.transaksi.kredit.export');    
    Route::get('/admin/transaksi-kredit/{transaksi}', [LaporanController::class, 'transaksiKreditPelangganExport'])->name('admin.transaksi.kredit.pelanggan.export');    
    Route::get('/admin/transaksi-kredit/nota/{id}', [LaporanController::class, 'transaksiKreditNotaExport'])->name('admin.transaksi.kredit.nota.export');    
    //-------------------------------- Laporan Transaksi Kredit --------------------------------//

    //-------------------------------- Laporan Transaksi ----------------------------//
    Route::get('/admin/transaksi/all', [LaporanController::class, 'transaksi'])->name('admin.transaksi.all');
    Route::get('/admin/transaksi/all-export', [LaporanController::class, 'transaksiExport'])->name('admin.transaksi.all.export');    
    //----------------------------- Laporan Transaksi --------------------------------//

   
    
    //---------------------------------- User ----------------------------------//
    Route::get('/admin/user',[UserController::class,'index'])->name('admin.user');
    Route::get('/admin/user/datatable',[UserController::class,'datatable'])->name('admin.user.datatable');
    Route::get('/admin/user/create',[UserController::class,'create'])->name('admin.user.create');
    Route::get('/admin/user/{id}/aktifkan',[UserController::class,'aktifkan'])->name('admin.user.aktifkan');
    //---------------------------------- User ----------------------------------//

});
