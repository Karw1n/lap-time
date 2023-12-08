<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/players', [PlayerController::class, 'index'])->name('players.index');

Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');

Route::post('/players' , [PlayerController::class, 'store'])->name('players.store');

Route::get('/players/{id}', [PlayerController::class, 'show'])->name('players.show');

Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');

// // GET
// Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
// Route::get('/blog/{id}', [PostsController::class, 'show'])->name('blog.show');

// // POST
// Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
// Route::post('/blog', [PostsController::class, 'store'])->name('blog.store');

// // PUT OR PATCH
// Route::get('/blog/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
// Route::get('/blog/{id}', [PostsController::class, 'update'])->name('blog.update');

// // DELETE
// Route::delete('/blog/{id}', [PostsController::class, 'destroy'])->name('blog.destory');

Route::prefix('blog')->group(function () {
    Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::post('', [PostsController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
    Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');
    Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');
    Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');
    Route::post('/{id}', [CommentController::class, 'addComment'])->name('blog.comment.add');
    Route::post('/{id}/delete-comment', [CommentController::class, 'destroy'])->name('blog.comment.destroy');
});

Route::resource('users', UserController::class)->only('show');

//Fallback route for when blog does not exist
Route::fallback(FallbackController::class);

Route::get('/', function () {
    return view('blogwelcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
