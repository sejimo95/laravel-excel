<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\XmlController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PanelController::class, 'index']);
Route::get('xml', [XmlController::class, 'index']);
Route::get('excel', [ExcelController::class, 'index']);

Route::post('generate-xml', [XmlController::class, 'generate']);
Route::get('download-excel', [ExcelController::class, 'download']);
