<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Product\ProductController;
use App\Models\Comment;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/articles',function(){
//     return "<h1>Articles page</h1>";
// })->name("articles");

// Route::get("/articles/detail/{id}",function($id){
//     return "<h2>Artilcles/detail -$id </h2>";
// });

// // Route name
// Route::get("/articles/deatil",function(){
//     return "Article Detail";
// })->name("articles.detail");

// Route::get("/articles/more",function(){
//     return redirect()->route("articles.detail");
// });

// Route::get("/articles/test",function(){
//     return redirect()->route("articles");
// });

//
Route::get("/", [ArticleController::class, "index"]);

Route::get("/articles", [ArticleController::class, "index"])->name("articles");

Route::get("articles/detail/{id}", [ArticleController::class, "detail"]);

Route::get("/articles/delete/{id}", [ArticleController::class, "delete"])->middleware("auth");

Route::get("/articles/add", [ArticleController::class, "add"]);

Route::post('/articles/add', [ArticleController::class,'create']);

Route::get("/articles/edit/{id}",[ArticleController::class,"edit"]);

Route::put("/articles/update/{id}",[ArticleController::class,"update"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect("/home","/");

Route::post("/comments/add",[CommentController::class,"create"])->name("comments.add");

Route::get("comments/delete/{id}",[CommentController::class,"delete"])->name("comments.delete");

Route::get("/products", [ProductController::class, "index"]);

Route::get("/products/detail/{product}", [ProductController::class, "detail"]);
