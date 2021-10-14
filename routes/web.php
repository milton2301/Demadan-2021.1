<?php

use App\Http\Controllers\ControllerDemadan;
use Illuminate\Support\Facades\Route;

Route::get('/',[ControllerDemadan::class, 'index']); /* Rota para a pagina princiapl do site */

Route::get('/admin/edit/{id}',[ControllerDemadan::class, 'edit'])->name('editar')->middleware('auth'); /* Rota que recupera uma tarefa para editar*/

Route::put('/admin/update/{id}',[ControllerDemadan::class, 'update'])->middleware('auth'); /* Rota que faz o update dos dados no banco */

Route::delete('/admin/{id}',[ControllerDemadan::class,'destroy'])->middleware('auth'); /*Rota que leva os dados que serão excluidos do banco  */

Route::get('/cadastra/create',[ControllerDemadan::class, 'create'])->name('cadastrar')->middleware('auth'); /* Rota que leva o para o cadastro de novos produtos */

Route::post('/cadastra',[ControllerDemadan::class, 'store'])->middleware('auth'); /* Rota que lança dos dados no banco */

Route::get('/produtos/produto/{id}',[ControllerDemadan::class, 'produto'])->name('ver_produto')->middleware('auth'); /* Rota que manda para as especificações de cada produto */

Route::get('/produtos/carrinho', [ControllerDemadan::class, 'carrinho'])->name('ver_carrinho')->middleware('auth'); /* Rota que manda o cliente para o seu carrinho de compras */

Route::get('/produtos/carrinho/adiciona/{id}', [ControllerDemadan::class, 'adiciona'])->name('adicionar')->middleware('auth'); /* que adiciona item do carrinho*/

Route::get('/remove/{index}', [ControllerDemadan::class, 'remove'])->name('remover')->middleware('auth'); /* Que remove item do carrinho*/

Route::post('/produtos/carrinho/finalizar', [ControllerDemadan::class, 'finalizar'])->name('finalizar_compra')->middleware('auth'); /* Finalizar compra*/

Route::get('/produtos/compras/historico', [ControllerDemadan::class, 'historico'])->name('historico_compras')->middleware('auth'); /* Ver histórico das compras*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); /* Rota que leva o usuário para fazer as verificações no seu perfil, editar, excluir */

