<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Pedido;
use App\Models\ItenPedido;
use Illuminate\Support\Facades\DB;

class CompraServices{

    public function finalizarCompra($produtos = [], User $user){

        try {
            DB::beginTransaction();
            $pedido = new Pedido();

            $pedido->status = "PEN";
            $pedido->usuario_id = $user->id;
            $pedido->save();

            foreach($produtos as $prod){

                $itens = new ItenPedido();

                $itens->quantidade = 1;
                $itens->valor = $prod->valor;
                $itens->produto_id = $prod->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();

            }
            DB::commit();
            return ['status' => 'ok', 'message' => 'Compra finalizada com sucesso!'];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ERRO: VENDA SERVICE", ['message' => $e->getMessage()] );
            return ['status'=>'err', 'message' => 'A compra não pode ser completada!'];
        }

    }

}
