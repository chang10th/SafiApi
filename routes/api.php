<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function(){
    // ----------------------------------- Visit -----------------------------------
    Route::get('/visit',[\App\Http\Controllers\VisitController::class, 'index'])->name('visit');
    Route::post('/visit/storeVisit',[\App\Http\Controllers\VisitController::class, 'storeVisit'])->name('visit.storeVisit');
    Route::get('/visit/{id}',[\App\Http\Controllers\VisitController::class, 'show'])->name('visit.show');
    Route::post('/visit/{id}/storeVisitreport',[\App\Http\Controllers\VisitController::class, 'storeVisitreport'])->name('visit.storeVisitreport');
    Route::put('/visit/{id}/update',[\App\Http\Controllers\VisitController::class, 'update'])->name('visit.update');
    Route::delete('/visit/{id}/delete',[\App\Http\Controllers\VisitController::class, 'delete'])->name('visit.delete');

    // ----------------------------------- Practitioner -----------------------------------
    Route::get('/practitioner',[\App\Http\Controllers\PractitionerController::class, 'index'])->name('practitioner');

    // ----------------------------------- Sector -----------------------------------
    Route::get('/sector',[\App\Http\Controllers\SectorController::class, 'index'])->name('sector');

    // ----------------------------------- Employee -----------------------------------
    Route::get('/employee',[\App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');

    // ----------------------------------- Medecine -----------------------------------
    Route::get('/medecine',[\App\Http\Controllers\MedecineController::class, 'index'])->name('medecine');
    Route::get('/medecine/{id}',[\App\Http\Controllers\MedecineController::class, 'show'])->name('medecine');
});
