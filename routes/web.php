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


Route::get('/', 'App\Http\Controllers\Home@index');
Route::get('/add_expense_page', 'App\Http\Controllers\Home@add_expense_page');
Route::get('/get_dashoard', 'App\Http\Controllers\Home@get_dashoard');
Route::get('/get_graph', 'App\Http\Controllers\Home@get_graph');
Route::post('/saveExpense', 'App\Http\Controllers\Home@saveExpense');


