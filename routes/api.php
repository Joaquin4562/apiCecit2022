<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

//Proyectos
Route::get('/proyectos', [ProyectoController::class, 'getProyectosAll']);
Route::get('/proyectos/{sede}', [ProyectoController::class, 'getProyectosSede']);
Route::get('/proyectos/{sede}/{cat}', [ProyectoController::class, 'getProyectosSedeCat']);
Route::delete('/proyectos/{id}', [ProyectoController::class, 'delete']);
//Asesores
Route::get('/asesores', [AsesorController::class, 'getAsesoresAll']);
Route::get('/asesores/{sede}', [AsesorController::class, 'getAsesoresSede']);
Route::put('/asesores/{id}', [AsesorController::class, 'update']);
Route::delete('/asesores/{id}', [AsesorController::class, 'delete']);
//Autores
Route::get('/autores', [AutorController::class, 'getAutoresAll']);
Route::get('/autores/{sede}', [AutorController::class, 'getAutoresSede']);
Route::delete('/autores/{id}', [AutorController::class, 'delete']);
Route::put('/autores/{id}', [AutorController::class, 'update']);
// rutas para el dashboard
//header
// proyectos - participantes
Route::get('/dashboard/header', [DashboardController::class, 'getHeaderDashboardAll']);
Route::get('/dashboard/header/{sede}', [DashboardController::class, 'getHeaderDashboardSede']);
// estadisticas proyectos por categorias
Route::get('dashboard/estadisticas', [DashboardController::class, 'getEstadisticasAll']);
Route::get('dashboard/estadisticas/{sede}', [DashboardController::class, 'getEstadisticasSede']);


