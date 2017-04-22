<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Dependency injections
use Auth;

// Models
use App\Models\Parceiro;

// Requests
use App\Http\Requests\ParceiroRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parceiro = Auth::guard('parceiro')->user();
        
        return view('parceiro.home')->with([
            'parceiro'  =>  $parceiro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizarDados(ParceiroRequest $request)
    {
        $parceiro_atualizado = Parceiro::atualizaParceiro(Auth::guard('parceiro')->user(), $request->except(['_method', '_token', 'id_parceiro']));
        
        if (!$parceiro_atualizado) {
            return redirect()->back()->withInput($request->all())->withMensagem([
                'text'      =>  'Por favor, tente novamente.',
                'class'     =>  'error'
            ]);
        }
        
        return redirect()->back()->withMensagem([
            'class'     =>  'success',
            'text'      =>  'Dados atualizados com sucesso.'
        ]);
    }
}
