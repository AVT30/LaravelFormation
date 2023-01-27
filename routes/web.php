<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


//route::get('/', Classe crée dans le controllers::class, 'nom de la fonction qui est dans la classe'))

Route::get('articles', [PostController::class, 'index'])->name('welcome');
//mettre avant post/{id} car sinon il croit qu'on cherche une id dont la valeur est create
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

                                                            //appeller de facon dinamique grace a un nom
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
                                                        //name sert a donner un nom de chemin qu'on utilisera pour appeler la page
Route::get('/contactez-nous', [PostController::class, 'contact'])->name('contact');





