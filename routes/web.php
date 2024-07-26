<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonalKelasController;
use App\Http\Controllers\tectController;
use App\Http\Middleware\Activty;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//route beranda
Route::get('/', function () {
    return view('home.home');
});
Route::get('/e', [tectController::class, 'index'])->name('e');

Route ::middleware([Activty::class])->group(function () {
    Route::get ('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    });
  
//Route login, register dan logout
    Route ::get ('/register',[AuthController::class,'formRegister'])->name('register');
    Route ::get ('/login',[AuthController::class,'formLogin'])->name('login');
    Route ::get ('/logout',[AuthController::class,'logout'])->name('logout');
    Route ::post('/register',[AuthController::class,'prosesregister'])->name('register');
    Route ::post('/login',[AuthController::class,'prosesLogin'])->name('login');

    //Route method middleware untuk login fitnes dan admin
        Route :: middleware([CheckLogin::class])->group(function () {
        Route ::get  ('/home',[AuthController::class,'dashboard'])->name('dashboard');
        Route ::get  ('/home/profile',[ProfileController::class,'index'])->name('profile');
        Route ::put  ('/home/profile/nama', [ProfileController::class, 'editNama'])->name('edit.nama');
        Route ::put  ('/home/profile/tinggi',[ProfileController::class,'edittinggi'])->name('edit.tinggi');
        Route ::put  ('/home/profile/berat',[ProfileController::class,'editberat'])->name('edit.berat');
    Route ::put  ('/home/profile/usia',[ProfileController::class,'editusia'])->name('edit.usia');
    Route ::put  ('/home/profile/foto',[ProfileController::class,'editfoto'])->name('edit.foto');
    Route ::get  ('/home/profile/mykelas',[PersonalKelasController::class,'kelas'])->name('kelasku')->middleware([CheckAge::class]);
    Route::get   ('/kelas/{kelas}', [KelasController::class, 'show'])->name('kelas.show');
    
});


//Route method middleware hanya untuk admin yang di izinkan untuk bisa akses route.
Route ::middleware([Activty::class])->group(function () {
    Route ::get ('/instructor',[InstructorController::class,'create'])->name('instructor.create');
    Route ::get ('/instructor/index',[InstructorController::class,'index'])->name('instructor.index');
    Route ::get ('/instructor/store',[InstructorController::class,'store'])->name('instructor.store');
    Route ::get ('/instructor/show',[InstructorController::class,'show'])->name('instructor.show');
    Route ::get ('/instructor/edit/{instructor}',[InstructorController::class,'edit'])->name('instructor.edit');
    Route ::get ('/instructor/show/{instructor}', [InstructorController::class, 'show'])->name('instructor.show');
    Route ::get ('/instructor/destroy',[InstructorController::class,'destroy'])->name('instructor.destroy');
    Route ::get ('/instructor/update',[InstructorController::class,'update'])->name('instructor.update');
    Route ::post('/instructor',[InstructorController::class,'create'])->name('instructor.create');
    Route ::post ('/instructor/store',[InstructorController::class,'store'])->name('instructor.store');
    Route ::put ('/instructor/update/{instructor}', [InstructorController::class, 'update'])->name('instructor.update');
    Route ::delete('/instructor/{instructor}', [InstructorController::class, 'destroy'])->name('instructor.destroy');
    
 
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    Route:: get ('/fitnes',[DashboardController::class,'fitnes'])->name('fitnes.index');
    Route:: get ('/fitnes/{fitnes}',[DashboardController::class,'show'])->name('fitnes.show');
    Route:: get ('/fitnes/edit/{fitnes}',[DashboardController::class,'edit'])->name('fitnes.edit');
    Route:: put ('/fitnes/update/{fitnes}',[DashboardController::class,'update'])->name('fitnes.update');
    Route:: delete ('/fitnes/destroy/{fitnes}',[DashboardController::class,'destroy'])->name('fitnes.destroy');
});