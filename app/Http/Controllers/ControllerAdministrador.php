<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ControllerAdministrador extends Controller
{

    public function update(Request $request){

        Produto::findOrFail($request->id)->update($request->all());

        return redirect('/'); /*->with('msg','Tarefa atualizado com sucesso!'); */

    }

}
