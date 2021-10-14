<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = ['status', 'usuario_id'];

    public function statusDesc(){
        $descricao = "";

        switch($this->status) {
            case 'PEN' : $descricao = "PENDENTE";break;
            case 'FIN' : $descricao = "FINALIZADO";break;
            case 'CAN' : $descricao = "CANCELADO";break;
        }
        return $descricao;
    }
}
