<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\ItenPedido;
use App\Models\User;
use App\Services\CompraServices;
use Illuminate\Support\Facades\DB;

class ControllerDemadan extends Controller
{

    public function index(){ /* Função que gerencia os dados da pagina principal */

        $data = [];

        $search = request('search');
        $filtroTipo = request('tipo');
        $filtroMarca = request('marca');
        $filtroTamanho = request('tamanho');

        if($search){
            $produtos = Produto::where([
                ['nome', 'like', '%' .$search. '%']
            ])->get();
        }elseif($filtroTipo){
            $produtos = Produto::where([
                ['tipo', 'like', '%' .$filtroTipo. '%']
            ])->get();
        }elseif($filtroMarca){
            $produtos = Produto::where([
                ['marca', 'like', '%' .$filtroMarca. '%']
            ])->get();
        }elseif($filtroTamanho){
            $produtos = Produto::where([
                ['tamanho', 'like', '%' .$filtroTamanho. '%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }

        $tiposProdutos = Produto::select('tipo')->groupBy('tipo')->get();
        $marcaProdutos = Produto::select('marca')->groupBy('marca')->get();
        $tamanhoProdutos = Produto::select('tamanho')->groupBy('tamanho')->get();

        $data['tamanhoProdutos'] = $tamanhoProdutos;
        $data['marcaProdutos'] = $marcaProdutos;
        $data['tiposProdutos'] = $tiposProdutos;
        $data['produtos'] = $produtos;
        $data['search'] = $search;
        $data['filtroTipo'] = $filtroTipo;
        $data['filtroMarca'] = $filtroMarca;
        $data['filtroTamanho'] = $filtroTamanho;

        return view('index', $data);
    }


    public function produto($id){ /* Função que retorna os dados de um produto especifico*/

        $data = [];

        $produtos = Produto::findOrFail($id);

        $data['produtos'] = $produtos;

        return view('produtos.produto', $data);
    }


    public function edit($id){ /* Função que pega o id de um produto especifico para editar */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){
            $produto = Produto:: findOrFail($id);
            return view('admin.edit', ['produto'=>$produto]);
        }else{
            $search = request('search');
        $filtroTipo = request('tipo');
        $filtroMarca = request('marca');

        if($search){
            $produtos = Produto::where([
                ['nome', 'like', '%' .$search. '%']
            ])->get();
        }elseif($filtroTipo){
            $produtos = Produto::where([
                ['tipo', 'like', '%' .$filtroTipo. '%']
            ])->get();
        }elseif($filtroMarca){
            $produtos = Produto::where([
                ['marca', 'like', '%' .$filtroMarca. '%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }

        $tiposProdutos = Produto::select('tipo')->groupBy('tipo')->get();
        $marcaProdutos = Produto::select('marca')->groupBy('marca')->get();

        $data['marcaProdutos'] = $marcaProdutos;
        $data['tiposProdutos'] = $tiposProdutos;
        $data['produtos'] = $produtos;
        $data['search'] = $search;
        $data['filtroTipo'] = $filtroTipo;
        $data['filtroMarca'] = $filtroMarca;

        return view('index', $data);
        }

    }

    public function update(Request $request){ /* Função que faz a injeção dos dados atualizados no banco */

        Produto::findOrFail($request->id)->update($request->all());

        return redirect('/'); /*->with('msg','Tarefa atualizado com sucesso!'); */

    }

    public function destroy($id){ /* Função que apaga um item selecionado do banco */

        Produto::findOrFail($id)->delete();

        return redirect('/');/*->with('msg','Tarefa concluida com sucesso!'); */

    }

    public function create(){  /* Função de que retorna a rota de criação de produtos */

        return view('admin.create');

    }

    public function store(Request $request){ /* Função que cria os novos produtos no banco */
        $produtos = new Produto;

        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->cor = $request->cor;
        $produtos->tamanho = $request->tamanho;
        $produtos->marca = $request->marca;
        $produtos->valor = $request->valor;

        //Upload de imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $imagemUpload = $request->imagem;

            $extensao = $imagemUpload->extension();

            $nomeImagem = md5($imagemUpload->getClientOriginalName() . strtotime("now") . "." . $extensao);

            $imagemUpload->move(public_path('img/imagensRoupas'), $nomeImagem);

            $produtos->imagem = $nomeImagem;
        }

        $produtos->save();

        return redirect('/');
    }

    public function adiciona($id){ // Função que adiciona os produtos no carrinho

        $produto = Produto::findOrFail($id);

        if($produto){

            $carrinho = session('cart', []);

            array_push($carrinho, $produto);

            session(['cart' => $carrinho]);

        }

        return redirect('/');
    }

    public function carrinho(Request $request){ /* Função que retorna os dados do carrinho de compra de um usuário */

        $carrinho = session('cart', []);
        $data = ['cart'=>$carrinho];

        return view('produtos.carrinho',$data);
    }

    public function remove($index){

        $carrinho = session('cart', []);

        if(isset($carrinho[$index])){
            unset($carrinho[$index]);
        }

        session(['cart' => $carrinho]);
        return redirect()->route("ver_carrinho");
    }

    public function finalizar(Request $request){

        $produtos = session('cart', []);

        $compra = new CompraServices();

        $estado = $compra->finalizarCompra($produtos, auth()->user());

        if($estado['status'] == 'ok'){
            $request->session()->forget('cart');
        }

        $request->session()->flash($estado['status'], $estado['message']);

        return redirect()->route("ver_carrinho");
    }

    public function historico(){

        $data = [];

        $user = auth()->user();

        $id_user = $user->id;

        $pedidos = Pedido::where('usuario_id', $id_user)->orderBy('created_at', 'desc')->get();

        $data['pedidos'] = $pedidos;

        return view('produtos.compras', $data);

    }

    public function detalhes(Request $request){

        $data = [];
        $id_pedido = $request->input("id_pedido");

        $listaItens = ItenPedido::join("produtos","produtos.id", "=" ,"iten_pedidos.produto_id")->where("pedido_id", $id_pedido)->get(['iten_pedidos.*','iten_pedidos.valor as itemValor','produtos.*']);

        $totalGeral = DB::table("iten_pedidos")->where("pedido_id", $id_pedido)->get()->sum("valor");

        $data['total'] = $totalGeral;
        $data['listaItens'] = $listaItens;

        return view('produtos.detalhes', $data);

    }

    public function pagar(){
        $data = [];

        return view('produtos.pagar', $data);
    }

}
