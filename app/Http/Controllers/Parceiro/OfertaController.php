<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OfertaController extends Controller
{
    public function create()
    {
        return view('parceiro.cadastrarOferta');
    }
    
    public function store(Request $request)
    {
        
        $oferta = (\App\Models\Oferta::create([
            'id_parceiro'           =>  \Auth::guard('parceiro')->user()->id_parceiro,
            'nm_oferta'             =>  $request->input('nm_oferta'),
            'ds_oferta'             =>  $request->input('ds_oferta'),
            'ic_status_oferta'      =>  $request->input('ic_status_oferta')
        ]));
        
        if (!$oferta) {
            return redirect()->back()->withMensagem([
                'text'      =>  'Oferta não cadastrada. Por favor, tente novamente',
                'class'     =>  'danger'
            ]);
        }
        
        // if (!empty($request->input('ic_status_oferta'))) {
        //     \App\Models\Oferta::where('ic_status_oferta', 1)->where('id_oferta', '!=', $oferta->id_oferta)->update(['ic_status_oferta' => 0]);
        // }
        return redirect()->back()->withMensagem([
            'text'      =>  'Oferta cadastrada com sucesso.',
            'class'     =>  'success'
        ]);
    }
    
    public function edit(\App\Models\Oferta $oferta) 
    {
        return view('parceiro.editarOferta')->with([
            'oferta'    =>  $oferta
        ]);
    }
    
    public function update(Request $request)
    {
        \App\Models\Oferta::where('id_parceiro', $request->input('id_parceiro'))->update(['ic_status_oferta'  =>  0]);
        
        $oferta = \App\Models\Oferta::find($request->input('id_oferta'));
        
        $oferta->fill($request->all());
        
        if ($oferta->save()) {
            return redirect()->back()->withMensagem([
                'class'     =>  'success',
                'text'      =>  'Alterado com sucesso'
            ]);
        } else {
            return redirect()->back()->withMensagem([
                'class'     => 'error',
                'text'      =>  'Por favor, tente novamente'
            ]);
        }
        
    }
    
    public function index()
    {
        $ofertas = \App\Models\Oferta::where('id_parceiro', \Auth::guard("parceiro")->user()->id_parceiro)->get();
        
        
        return view('parceiro.listagemOferta')->with([
            'ofertas'   =>  $ofertas
        ]);
    }
}
