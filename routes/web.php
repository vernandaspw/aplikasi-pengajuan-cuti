<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\KelolaAkun;
use App\Http\Livewire\KelolaJenisPengajuan;
use App\Http\Livewire\KelolaPengajuan;
use App\Http\Livewire\KelolaSetting;
use App\Http\Livewire\KelolaSubjenisPengajuan;
use App\Http\Livewire\Login;
use App\Http\Livewire\Pengajuan;
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

// Route::get('/', function () {
//     return view('main');
// });

Route::get('login', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class);

    Route::get('pengajuan', Pengajuan::class);

    Route::get('kelola-pengajuan', KelolaPengajuan::class);
    Route::get('kelola-jenis-pengajuan', KelolaJenisPengajuan::class);
    Route::get('kelola-subjenis-pengajuan', KelolaSubjenisPengajuan::class);
    Route::get('kelola-setting', KelolaSetting::class);
    Route::get('kelola-akun', KelolaAkun::class);
});
