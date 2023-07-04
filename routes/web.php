<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutaiStokController;
use App\Http\Controllers\OrderKebutuhanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PeternakController;
use App\Http\Controllers\StaffController;
use App\Models\Order_kebutuhan;
use App\Models\Peternak;
use App\Models\Stok_peternak;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});
Route::get('/dashboard','App\Http\Controllers\HomeController@index')->name('dashboard');
Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('index');
require __DIR__.'/auth.php';
Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');
 });

Route::get('tambahkaryawan',function(){
    return view('formtambahkaryawan');
});
Route::get('tambahpeternak',function(){
    return view('formtambahpeternak');
});
Route::post('/karyawan',[StaffController::class,'tambahkaryawan']);
Route::post('/tbhpeternak',[PeternakController::class,'tambahpeternak']);
Route::get('/datapeternak',[PeternakController::class,'getdatapeternak'])->name('datapeternak');
Route::get('/datakaryawan',[StaffController::class,'getdatakaryawan'])->name('datakaryawan');
Route::get('/datastok',[PeternakController::class,'stokpeternak'])->name('datastok');
Route::get('/formpengiriman',[PengirimanController::class,'showkirim']);
Route::post('/kirim',[PengirimanController::class,'buatpengiriman']);

Route::get('/tampilprofil',[StaffController::class,'profil']);

Route::post('/orderkebutuhan',[OrderKebutuhanController::class,'inputorder']);
Route::get('/showorderform',[OrderKebutuhanController::class,'showorderform']);

Route::get('/getorder',[Order_kebutuhan::class,'getorder']);
Route::post('/prosorder',[Order_kebutuhan::class,'prosesorder']);

Route::get('/showpindah',[MutaiStokController::class,'showpindah']);
Route::post('/pindahstok',[MutaiStokController::class,'pindahstok']);
Route::get('/rekapjual',[PenjualanController::class,'rekapjual']);
Route::post('/inputjual',[PenjualanController::class,'inputjual']);
Route::get('/showformjual',[PenjualanController::class,'formjual']);
Route::post('/tambahbarang',[BarangController::class,'tambahbarang']);
