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

Route::get('/Home', function () {
    return view('Home');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/Equipe', function (){
    return view('Equipe');
})->middleware(['auth', 'verified'])->name('equipe');
Route::get('/import', function (){
    return view('ImportCSV');
})->middleware(['auth', 'verified'])->name('import');

Route::get('/coureur/{equipe?}',[\App\Http\Controllers\CoureurController::class,'Coureur'])->middleware(['auth', 'verified']);
Route::get('/listeEquipe', [\App\Http\Controllers\EquipeController::class,'ListEquipes'])->middleware(['auth', 'verified'])->name('listequipe');
Route::get('/listecourse',[\App\Http\Controllers\CourseController::class,'getCourses'])->middleware(['auth', 'verified'])->name('listecourse');
Route::get('/Etapes/{course?}', [\App\Http\Controllers\EtapeController::class,'etapes'])->middleware(['auth', 'verified']);
Route::get('/Classement',[\App\Http\Controllers\ClassementController::class,'classement'])->middleware(['auth', 'verified'])->name('classement');
Route::get('/ClassementGeneral',[\App\Http\Controllers\ClassementController::class,'ClassementGeneral'])->middleware(['auth', 'verified'])->name('classementgeneral');
Route::get('/Penalite',[\App\Http\Controllers\PenaliteController::class,'Penalite'])->middleware(['auth', 'verified'])->name('penalite');
Route::get('/deletePenalite/{id?}',[\App\Http\Controllers\PenaliteController::class,'DeletePenalite'])->middleware(['auth', 'verified']);
Route::get('/PDF/{equipe?}/{points?}',[\App\Http\Controllers\EportPDF::class,'ExportPDF'])->middleware(['auth', 'verified']);
Route::get('/DetailEtape/{etape?}/{nom?}',[\App\Http\Controllers\EtapeController::class,'DetailEtape'])->middleware(['auth', 'verified']);
Route::get('/DetailPoint/{equipe?}',[\App\Http\Controllers\ClassementController::class,'DetailPointEquipe'])->middleware(['auth', 'verified']);

Route::post('/savePenalite',[\App\Http\Controllers\PenaliteController::class,'SavePenalite'])->middleware(['auth', 'verified'])->name('savepenalite');
Route::post('/ListClassement',[\App\Http\Controllers\ClassementController::class,'ListClassement'])->middleware(['auth', 'verified'])->name('listclassement');
Route::post('/ClassementGenre',[\App\Http\Controllers\ClassementController::class,'ClassementGenre'])->middleware(['auth', 'verified'])->name('ClassementGenre');
Route::post('/ClassementCategorie',[\App\Http\Controllers\ClassementController::class,'ClassementCategorie'])->middleware(['auth', 'verified'])->name('ClassementCategorie');
Route::post('/savecourses',[\App\Http\Controllers\CourseController::class,'SaveCourse'])->name('save-course');
Route::post('/saveetapes',[\App\Http\Controllers\EtapeController::class,'SaveEtapes'])->name('save-etapes');
Route::post('/saveequipe',[\App\Http\Controllers\EquipeController::class,'SaveEquipe'])->name('save-equipe');
Route::post('/savecoureur',[\App\Http\Controllers\CoureurController::class,'SaveCoureur'])->middleware(['auth', 'verified'])->name('save-coureur');
Route::post('/importpoint',[\App\Http\Controllers\PointController::class,'importPoints'])->middleware(['auth', 'verified'])->name('importpoint');
Route::post('/importresultatetape',[\App\Http\Controllers\EtapeController::class,'importEtapeResultat'])->middleware(['auth', 'verified'])->name('importresultatetape');
Route::get('/reset',[\App\Http\Controllers\Admin::class,'deleteAll'])->middleware(['auth', 'verified'])->name('reset');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
