<?php

use App\Models\Group;
use Illuminate\Support\Facades\Route;

// A gyökér (/) útvonal
Route::get('/', function () {
    // Csak azokat a csoportokat kérjük le, ahol a visible = true, és betöltjük a hozzájuk tartozó típusokat is
    $groups = Group::where('visible', true)->with('types')->get();

    // Átadjuk az adatokat a breeds.blade.php fájlnak
    return view('breeds', compact('groups'));
});
