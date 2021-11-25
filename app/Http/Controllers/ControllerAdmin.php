<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\ItenPedido;
use App\Models\User;
use App\Services\CompraServices;
use Illuminate\Support\Facades\DB;

class ControllerAdmin extends Controller
{
    public function edit($id){ /* Função que pega o id de um produto especifico para editar */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){
            $produto = Produto:: findOrFail($id);
            return view('admin.edit', ['produto'=>$produto]);
        }else{
            $search = request('search');

            if($search){
                $produtos = Produto::where([
                    ['nome', 'like', '%' .$search. '%']
                ])->get();
            }else{
                $produtos = Produto::all();
            }
            return view('admin/indexAdmin',['produtos' => $produtos, 'search' => $search]);
        }

    }

    public function update(Request $request){ /* Função que faz a injeção dos dados atualizados no banco */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        Produto::findOrFail($request->id)->update($request->all());

        return redirect('admin/indexAdmin'); /*->with('msg','Tarefa atualizado com sucesso!'); */
        }
    }

    public function destroy($id){ /* Função que apaga um item selecionado do banco */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        Produto::findOrFail($id)->delete();

        return redirect('admin/indexAdmin');/*->with('msg','Tarefa concluida com sucesso!'); */
        }
    }

    public function create(){  /* Função de que retorna a rota de criação de produtos */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        return view('admin.create');
        }
    }

    public function store(Request $request){ /* Função que cria os novos produtos no banco */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        $produtos = new Produto;

        $produtos->tipo = $request->tipo;
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

        return redirect('admin/indexAdmin');
        }
    }

    public function indexAdmin(){ /* Função que gerencia os dados da pagina principal */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        $search = request('search');

        if($search){
            $produtos = Produto::where([
                ['nome', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }

        return view('admin.indexAdmin',['produtos' => $produtos, 'search' => $search]);
        }
    }

    public function produto($id){ /* Função que retorna os dados de um produto especifico*/

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        $produtos = Produto::findOrFail($id);

        return view('admin.produto',['produtos' => $produtos]);
        }
    }

    public function pedidosPen(){

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        $pedidos = Pedido::all();

        return view('admin.pedidosAdmin',['pedidos' => $pedidos]);
        }

    }

    public function pedidosFin(){

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        $pedidos = Pedido::all();

        return view('admin.pedidosAtendidos',['pedidos' => $pedidos]);
        }

    }

    public function atenderPedido($id){

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

            $data = [];

            $pedidos = Pedido::findOrFail($id);
            $idUser = $pedidos->usuario_id;

            $pesquisa = $pedidos->id;

            $listaItens = ItenPedido::join("produtos","produtos.id", "=" ,"iten_pedidos.produto_id")->where("pedido_id", $pesquisa)->get(['iten_pedidos.*','iten_pedidos.valor as itemValor','produtos.*']);

            $usuario = DB::table('users')->select('name')->where('users.id', $idUser)->get()->first();

            $data['listaItens'] = $listaItens;
            $data['usuario'] = $usuario;
            $data['pedido'] = $pedidos;

            return view('admin.atenderPedidos', $data);

        }

    }

    public function finalizarPedido(Request $request){ /* Função que faz a injeção dos dados atualizados no banco */

        $user = auth()->user();

        $email = $user->email;

        if($email == 'amiltongomes2301@gmail.com'){

        Pedido::findOrFail($request->id)->update($request->all());

        $pedidos = Pedido::all();

        return view('admin.pedidosAdmin',['pedidos' => $pedidos]);
        }
    }

}
