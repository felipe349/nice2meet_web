<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TuristaRequest;

use App\Models\Turista;

use \Carbon\Carbon;

class TuristaController extends Controller
{
    public function index(){
        $turistas = Turista::getTuristas(10);
        
        return view('admin.listarTurista')->with([
            'turistas'  =>  $turistas
        ]);
    }
    
    public function edit(Turista $turista)
    {
        return view('admin.editarTurista')->with([
            'turista'   =>  $turista
        ]); 
    }
    
    public function store(TuristaRequest $request)
    {
        // $turista = new Turista;
        
        // $turista->fill($request->all());
        // return $turista->save();
        
        return Turista::createTurista($request->except(['_method', '_token']));
    }
    
    public function update(Request $request, Turista $turista)
    {
        if (!Turista::updateTurista($turista, $request->except(['_token', '_method']))) {
            return redirect()->back()->withRequest($request->all())->withMensagem([
                'class'     =>  'error',
                'text'   =>  'Por favor, tente novamente.'
            ]);
        }
        
        return redirect()->back()->withRequest($request->all())->withMensagem([
            'class'     =>  'success',
            'text'   =>  'Turista atualizado com sucesso.'
        ]);
    }
}
