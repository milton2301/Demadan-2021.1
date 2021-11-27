<?php

use App\Http\Controllers\ControllerDemadan;
use App\Http\Controllers\ControllerAdmin;
use Illuminate\Support\Facades\Route;


Route::get('/admin/edit/{id}',[ControllerAdmin::class, 'edit'])->name('editar')->middleware('auth'); /* Rota que recupera uma tarefa para editar*/

Route::put('/admin/update/{id}',[ControllerAdmin::class, 'update'])->middleware('auth'); /* Rota que faz o update dos dados no banco */

Route::delete('/admin/{id}',[ControllerAdmin::class,'destroy'])->middleware('auth'); /*Rota que leva os dados que serão excluidos do banco  */

Route::get('/admin/create',[ControllerAdmin::class, 'create'])->name('cadastrar')->middleware('auth'); /* Rota que leva o para o cadastro de novos produtos */

Route::post('/admin',[ControllerAdmin::class, 'store'])->middleware('auth'); /* Rota que lança dos dados no banco */

Route::get('/admin/indexAdmin',[ControllerAdmin::class, 'indexAdmin'])->name('admin')->middleware('auth'); /* Rota para a pagina princiapl do site */

Route::get('/admin/produto/{id}',[ControllerAdmin::class, 'produto'])->name('ver_prod')->middleware('auth'); /* Rota que manda para as especificações de cada produto */

Route::get('/admin/pedidosAdmin', [ControllerAdmin::class, 'pedidosPen'])->name('pedidos_pendentes');

Route::get('/admin/pedidosAtendidos', [ControllerAdmin::class, 'pedidosFin'])->name('pedidos_finalizados');

Route::get('/admin/atenderPedidos/{id}', [ControllerAdmin::class, 'atenderPedido'])->name('atender_pedido')->middleware('auth');

Route::put('/admin/atenderPedidos/{id}', [ControllerAdmin::class, 'finalizarPedido'])->name('pedidos_status')->middleware('auth');


/* Configurações das rotas de funções de usuário*/
Route::get('/',[ControllerDemadan::class, 'index'])->name('index'); /* Rota para a pagina princiapl do site */

Route::get('/privacidade/politica',[ControllerDemadan::class, 'politica'])->name('privacidade');

Route::get('/produtos/produto/{id}',[ControllerDemadan::class, 'produto'])->name('ver_produto');/* Rota que manda para as especificações de cada produto */

Route::get('/produtos/carrinho', [ControllerDemadan::class, 'carrinho'])->name('ver_carrinho')->middleware('auth'); /* Rota que manda o cliente para o seu carrinho de compras */

Route::get('/produtos/carrinho/adiciona/{id}', [ControllerDemadan::class, 'adiciona'])->name('adicionar')->middleware('auth'); /* que adiciona item do carrinho*/

Route::get('/remove/{index}', [ControllerDemadan::class, 'remove'])->name('remover')->middleware('auth'); /* Que remove item do carrinho*/

Route::post('/produtos/carrinho/finalizar', [ControllerDemadan::class, 'finalizar'])->name('finalizar_compra')->middleware('auth'); /* Finalizar compra*/

Route::get('/produtos/compras/historico', [ControllerDemadan::class, 'historico'])->name('historico_compras')->middleware('auth'); /* Ver histórico das compras*/

Route::post('/produtos/compras/detalhes', [ControllerDemadan::class, 'detalhes'])->name('detalhes_compras')->middleware('auth'); /* Ver detalhes das compras*/

Route::match(['get', 'post'], '/compras/pagar', [ControllerDemadan:: class, 'pagar'])->name('pagamento')->middleware('auth');

Route::match(['get', 'post'], '/compras/estoque', [ControllerAdmin:: class, 'estoque'])->name('ver_estoque')->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); /* Rota que leva o usuário para fazer as verificações no seu perfil, editar, excluir */

