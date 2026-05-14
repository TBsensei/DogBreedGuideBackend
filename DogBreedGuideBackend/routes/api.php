<?php

use App\Http\Controllers\DogBreedController;
use Illuminate\Support\Facades\Route;

// Beállítjuk a feladat által kért végpontokat
Route::get('/groups', [DogBreedController::class, 'getGroups']);
Route::get('/types', [DogBreedController::class, 'getTypes']);
Route::get('/types/{id}', [DogBreedController::class, 'show']);
Route::post('/types', [DogBreedController::class, 'store']);
