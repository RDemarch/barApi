<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Bar;
use App\Models\Commentaire;
use App\Models\Utilisateur;
Use App\Http\Controllers\Api\AuthController;


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

Route::apiResource('bar', 'BarController');
Route::get('bar/comments/{id}', 'BarController@showComments');

Route::apiResource('comments', 'CommentaireController');
Route::get('showCommentsBar/{id}', 'CommentaireController@showCommentsBar');

Route::apiResource('utilisateur', 'UtilisateurController');
Route::post('utilisateur/login', 'UtilisateurController@login');

Route::get('fix', 'UtilisateurController@getfix');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
