<?php

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

Route::post('/annual-leaves', 'AnnualLeaveController@createAnnualLeave');
Route::get('/annual-leaves', 'AnnualLeaveController@getAllAnnualLeaves');
Route::get('/annual-leaves/{id}', 'AnnualLeaveController@getAnnualLeave');
