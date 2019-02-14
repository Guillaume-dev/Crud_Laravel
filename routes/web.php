<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// pour creer les routes en rapport avec les controllers
    //users/            -> users.index & users.store
    //users/create      -> users.create
    //users/{user}      -> users.show & users.update
    //users/{user}/edit -> users.edit
Route::resource('users', 'UserController');

// Route pour supprimer un user
Route::get('users/{user}/destroy', 'UserController@destroyForm');

// //Route pour l'application d'exemple :
//     //pour les contacts on utilise seulement (only) les méthodes create et store pour le front
// Route::resource('contacts', 'Front\ContactController', ['only' => ['create', 'store']]);
//     //pour les méthodes index et destroy pour le back :
// Route::resource('contacts', 'ContactController', ['only' => ['index', 'destroy']]);
//     //pour les commentaires on utilise seulement (only) les méthodes update et destroy pour le front :
// Route::resource('comments', 'Front\CommentController', ['only' => ['update', 'destroy']]);
//     //pour les méthodes index et destroy pour le back :
// Route::resource('comments', 'CommentController', ['only' => ['index', 'destroy']]);
//     //pour les utilisateur dans le back on utilise seulement (only) les méthodes index, edit, update et destroy :
// Route::resource('users', 'UserController', ['only' => ['index', 'edit', 'update', 'destroy']]);
//     //par contre pour les articles en back la ressource est complète :
// Route::resource('posts', 'PostController');

// Pour Créer les routes en rapport avec l'API
Route::namespace('Api')->group(function() {
    Route::resource('users', 'UserController', ['except' => ['create', 'edit']]);
});