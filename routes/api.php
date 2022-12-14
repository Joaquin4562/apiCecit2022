<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FasesController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

//Proyectos
Route::get('/proyecto/{id}', [ProyectoController::class, 'get']);
Route::get('/proyectos', [ProyectoController::class, 'getProyectosAll']);
Route::get('/proyectos/{sede}', [ProyectoController::class, 'getProyectosSede']);
Route::get('/proyectos/{sede}/{cat}', [ProyectoController::class, 'getProyectosSedeCat']);
Route::delete('/proyecto/{id}', [ProyectoController::class, 'delete']);
Route::put('/proyecto',[ProyectoController::class, 'update']);
//Asesores
Route::get('/asesores', [AsesorController::class, 'getAsesoresAll']);
Route::get('/asesores/{sede}', [AsesorController::class, 'getAsesoresSede']);
Route::put('/asesor', [AsesorController::class, 'update']);
Route::delete('/asesor/{id}', [AsesorController::class, 'delete']);
//Autores
Route::get('/autores', [AutorController::class, 'getAutoresAll']);
Route::get('/autores/{sede}', [AutorController::class, 'getAutoresSede']);
Route::delete('/autor/{id}', [AutorController::class, 'delete']);
Route::put('/autor', [AutorController::class, 'update']);
// rutas para el dashboard
//header
// proyectos - participantes
Route::get('/dashboard/header', [DashboardController::class, 'getHeaderDashboardAll']);
Route::get('/dashboard/header/{sede}', [DashboardController::class, 'getHeaderDashboardSede']);
// estadisticas proyectos por categorias
Route::get('dashboard/estadisticas', [DashboardController::class, 'getEstadisticasAll']);
Route::get('dashboard/estadisticas/{sede}', [DashboardController::class, 'getEstadisticasSede']);
//estadisticas generales
Route::get('/estadisticas/proyectos/sede', [EstadisticasController::class, 'proyectosPorSede']);
Route::get('/estadisticas/proyectos/categoria', [EstadisticasController::class, 'proyectosPorCategoria']);
Route::get('/estadisticas/proyectos/area', [EstadisticasController::class, 'proyectosPorArea']);
Route::get('/estadisticas/proyectos/categoria/{sede}', [EstadisticasController::class, 'proyectosPorCategoriaPorSede']);
Route::get('/estadisticas/asesores/sede', [EstadisticasController::class, 'asesoresPorSede']);
Route::get('/estadisticas/participantes/sede', [EstadisticasController::class, 'participantesPorSede']);
Route::get('/estadisticas/participantes/categoria', [EstadisticasController::class, 'participantesPorCategoria']);
Route::get('/estadisticas/participantes/genero', [EstadisticasController::class, 'participantesPorGenero']);
// importar curriculum de juez
Route::post('/cv/subir', [CurriculumController::class, 'import']);
// activar fase estatal e internacional
Route::post('/fases/estatal', [FasesController::class, 'insertarGanadoresEstatal']);
Route::get('/fases/internacional', [FasesController::class, 'insertarGanadoresInternacional']);
// apis apra el excel
Route::get('/excel/all', [ExcelController::class, 'all']);
