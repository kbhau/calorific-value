<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = DB::table('calorific_values')
        ->join('locations', 'calorific_values.location_id', '=', 'locations.id')
        ->select('calorific_values.applicable_for', 'locations.name', 'calorific_values.value')
        ->get();
    return view('pages.index', ["data" => $data]);
});

Route::get('/wip', function () {
    return view('pages.wip');
});
