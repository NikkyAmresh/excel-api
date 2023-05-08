<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::post('/import-students', [StudentController::class, 'import']);
Route::get('/students', [StudentController::class, 'getStudents']);