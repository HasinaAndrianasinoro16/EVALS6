<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/Coureur', function (){
    return view('Coureur');
})->middleware(['auth','verified'])->name('Coureur');
Route::get('/Penalite',[\App\Http\Controllers\PenaliteController::class,'Penalite'])->middleware(['auth','verified'])->name('Penalite');
Route::get('/Affectation/{coureur?}/{etape?}',[\App\Http\Controllers\AffectController::class,'affect'])->middleware(['auth','verified']);
Route::get('/Etape/{course?}',[\App\Http\Controllers\EtapeController::class, 'getEtape'])->middleware(['auth', 'verified']);
Route::get('/listedescoureurs',[\App\Http\Controllers\CoureurController::class,'AllCoureur'])->middleware(['auth','verified'])->name('ListeCoureur');
Route::get('/course',[\App\Http\Controllers\CourseController::class,'Course'])->middleware(['auth','verified'])->name('course');
Route::get('/Classement',[\App\Http\Controllers\ClassementController::class,'classement'])->middleware(['auth', 'verified'])->name('classement');
Route::get('/ClassementGeneral',[\App\Http\Controllers\ClassementController::class,'ClassementGeneral'])->middleware(['auth', 'verified'])->name('classementgeneral');

Route::post('/savecoureur',[\App\Http\Controllers\CoureurController::class, 'SaveCoureur'])->middleware(['auth','verified'])->name('save-coureur');
Route::post('/saveetapecoureur',[\App\Http\Controllers\CoureurController::class,'SaveEtapeCoureur'])->middleware(['auth','verified'])->name('save-etapecoureur');
Route::post('/ListClassement',[\App\Http\Controllers\ClassementController::class,'ListClassement'])->middleware(['auth', 'verified'])->name('listclassement');
Route::post('/ClassementGenre',[\App\Http\Controllers\ClassementController::class,'ClassementGenre'])->middleware(['auth', 'verified'])->name('ClassementGenre');
Route::post('/ClassementCategorie',[\App\Http\Controllers\ClassementController::class,'ClassementCategorie'])->middleware(['auth', 'verified'])->name('ClassementCategorie');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
