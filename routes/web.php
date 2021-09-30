<?php

use App\Http\Controllers\ControllerDemadan;
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

Route::get('/',[ControllerDemadan::class, 'index']); /* Rota para a pagina princiapl do site */

Route::get('/admin/edit/{id}',[ControllerDemadan::class, 'edit']); /* Rota que recupera uma tarefa para editar*/

Route::put('/admin/update/{id}',[ControllerDemadan::class, 'update']); /* Rota que faz o update dos dados no banco */

Route::delete('/admin/{id}',[ControllerDemadan::class,'destroy'])->middleware('auth'); /*Rota que leva os dados que serão excluidos do banco  */

Route::get('/cadastra/create',[ControllerDemadan::class, 'create'])->middleware('auth'); /* Rota que leva o para o cadastro de novos produtos */

Route::post('/cadastra',[ControllerDemadan::class, 'store'])->middleware('auth'); /* Rota que lança dos dados no banco */

Route::get('/produtos/produto/{id}',[ControllerDemadan::class, 'produto'])->middleware('auth'); /* Rota que manda para as especificações de cada produto */

Route::get('/produtos/carrinho', [ControllerDemadan::class, 'carrinho'])->middleware('auth'); /* Rota que manda o cliente para o seu carrinho de compras */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); /* Rota que leva o usuário para fazer as verificações no seu perfil, editar, excluir */

