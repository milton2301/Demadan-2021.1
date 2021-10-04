<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

class ControllerDemadan extends Controller
{

    public function index(){ /* Função que gerencia os dados da pagina principal */

        $search = request('search');

        if($search){
            $produtos = Produto::where([
                ['nome', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }

        return view('index',['produtos' => $produtos, 'search' => $search]);
    }


    public function produto($id){ /* Função que retorna os dados de um produto especifico*/

        $user = auth()->user();

        $admin = $user->email;

        $produtos = Produto::findOrFail($id);

        return view('produtos.produto',['produtos' => $produtos, 'admin'=>$admin]);
    }


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
            return view('index',['produtos' => $produtos, 'search' => $search]);
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

    public function carrinho(){ /* Função que retorna os dados do carrinho de compra de um usuário */
        return view('produtos.carrinho');
    }

    public function create(){  /* Função de que retorna a rota de criação de produtos */

        return view('cadastra.create');

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

}
