<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/expenses', 'ExpenseController@all')->name('expenses.all');
Route::post('/expenses', 'ExpenseController@store')->name('expenses.store');
Route::get('/expenses/{expense}', 'ExpenseController@show')->name('expenses.show');
Route::put('/expenses/{expense}', 'ExpenseController@update')->name('expenses.update');
Route::delete('/expenses/{expense}', 'ExpenseController@destory')->name('expenses.destroy');
