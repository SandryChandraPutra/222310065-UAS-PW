<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BalasanController;
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('helpDesk.layouts.auth.login');
})->name('login');
Route::get('/register', function (){
    return view('helpDesk.layouts.auth.register');
});
Route::post('/regis', [MahasiswaController::class, 'registerMahasiswa']);
Route::post('/login/mahasiswa', [AuthController::class, 'loginMahasiswa'])->name('login.mahasiswa.form');
Route::post('/logout/mahasiswa', [AuthController::class, 'logoutMahasiswa'])->name('logout.mahasiswa.form');
Route::middleware(['auth:mahasiswa'])->group(function () {
    // Routes accessible to regular users
    Route::get('/main', [MahasiswaController::class, 'index']);

    Route::get('/cek', function (){
        return view('helpDesk.modules.tickets.cekticket');
    });

    Route::get('/buattiket', [TiketController::class, 'create'])->name('tiket.create');

    Route::post('/buat', [TiketController::class, 'store'])->name('tiket.store');

    Route::get('/reply', [BalasanController::class, 'getDataById']);
    Route::get('/cek', [BalasanController::class, 'showCheckTicketForm'])->name('check-ticket');
    Route::post('/checking', [BalasanController::class, 'checkTicket'])->name('check-ticket-submit');
    Route::get('/cekakun', [MahasiswaController::class, 'cekakun']);
    Route::get('/history', [MahasiswaController::class, 'history']);
    Route::post('/balasAdmin', [BalasanController::class, 'balasAdmin']);
});

//admin

// Route::get('/admins', [TiketController::class, 'index'])->middleware('auth:admin');

// Route::get('/details/{ticket}', [TiketController::class, 'getDataByID']);

// Route::get('/delete/{ticket}', [TiketController::class, 'destroy']);

Route::get('/register/admin',  [AdminController::class, 'create']);
Route::post('/regisAdmin',  [AdminController::class, 'registerAdmin']);
Route::get('/loginAdmin',  [AdminController::class, 'show']);
Route::post('/login/admin',  [Authcontroller::class, 'loginAdmin'])->name('login.admin');
Route::post('/logout/admin',  [Authcontroller::class, 'logoutAdmin'])->name('logout.mahasiswa');
Route::middleware(['auth:admin'])->group(function () {
    // Routes accessible to administrators
    Route::get('/admins', [TiketController::class, 'index']);
    Route::get('/details/{tiket}', [AdminController::class, 'getDataByID']);
    Route::get('/delete/{tiket}', [AdminController::class, 'destroy']);
    Route::get('/update/{tiket}', [AdminController::class, 'edit']);
    Route::post('/update/{tiket}/edit', [AdminController::class, 'update']);
    Route::post('/balasMahasiswa', [BalasanController::class, 'balasMahasiswa']);
    Route::get('/iframe', [BalasanController::class, 'showResponses'])->name('show-iframe');
});
