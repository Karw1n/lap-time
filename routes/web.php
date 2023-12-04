<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;


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

// GET
Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [PostsController::class, 'show'])->name('blog.show');

// POST
Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/blog', [PostsController::class, 'store'])->name('blog.store');

// PUT OR PATCH
Route::get('/blog/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
Route::get('/blog/{id}', [PostsController::class, 'update'])->name('blog.update');

// DELETE
Route::delete('/blog/{id}', [PostsController::class, 'destroy'])->name('blog.destory');

Route::prefix('/blog')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');
    Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
    Route::post('', [PostsController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
    Route::get('/{id}', [PostsController::class, 'update'])->name('blog.update');
    Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destory');
})

//Fallback route for when blog does not exist


//Route::resource('/blog', PostsController::class);

// Multiple HTTP verbs
// Route::any('/blog', [PostsController::class, 'index']);

// Route for invoke method
Route::get('/', HomeController::class);

Route::get('/', function () {
    return view('welcome');
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
