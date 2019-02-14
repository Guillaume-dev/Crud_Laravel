<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Pour Créer les routes en rapport avec l'API
Route::namespace('Api')->group(function() {
    Route::resource('users', 'UserController', ['except' => ['create', 'edit']]);
});
//-> Les routes créees automatiquement :
// api/users              | users.index      
// api/users/{user}       | users.show     
// api/users/{user}       | users.update    
// api/users/{user}       | users.destroy
