<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeuPrimeiroController;
use App\Http\Controllers\ProdutoContoller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function() {
    return 'Bem vindo a laravel';
});

Route::get('/app', [MeuPrimeiroController::class, 'store']);

Route::middleware('auth')->group(function () {
Route::get('/produtos', [ProdutoContoller::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoContoller::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoContoller::class, 'store'])->name('produtos.store');
Route::get('/produtos/{produto}/edit', [ProdutoContoller::class, 'edit'])->name('produtos.edit');
Route::get('/produtos/{produto}/show', [ProdutoContoller::class, 'show'])->name('produtos.show');
Route::put('/produtos/{produto}', [ProdutoContoller::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{produto}', [ProdutoContoller::class, 'update'])->name('produtos.destroy');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
// Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
// Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
// Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
// Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');

// Route::resource('produtos', ProdutoContoller::class);



// php artisan tinker
// \App\Models\User::create([
//     'name' => 'Admin',
//     'email' => 'admin@teste.com',
//     'password' => bcrypt('123456')
// ]);