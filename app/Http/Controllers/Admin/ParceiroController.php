<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// Models
use App\Models\Parceiro;

// Form Requests
use App\Http\Requests\ParceiroRequest;

class ParceiroController extends Controller
{
    public function create()
    {
        return view('admin.cadastrarParceiro');
    }
    
    public function store(Request $request)
    {
        $email = $request['email'];
        Mail::raw('Text to e-mail', function ($message) use ($email) {
            $message->to($email, 'Tutorials Point')->subject
            ('Teste');
            $message->from('claiohm@gmail.com','Nice2Meet');
        });   
        if (!Parceiro::criarParceiro($request->except(['_method', '_token']))) {
            return redirect()->back()->withInput($request->all())->withMensagem([
                'class' =>  'danger',
                'text'  =>  'Por favor, tente novamente.'
            ]);
        }
        
        return redirect()->back()->withMensagem([
            'class' =>  'success',
            'text'  =>  'Parceiro ' . $request->input('nm_parceiro') . ' cadastrado com sucesso'
        ]);
    }
    
    public function edit(Parceiro $parceiro)
    {
        return view('admin.editarParceiro')->with([
            'parceiro'  =>  $parceiro
        ]);
    }
    
    public function update(ParceiroRequest $request, Parceiro $parceiro)
    {
        if (!Parceiro::atualizaParceiro($parceiro, $request->except('_method', '_token'))) {
            return redirect()->back()->withInput($request->all())->withMensagem([
                'class'     =>  'error',
                'text'      =>  'Por favor, tente novamente.'
            ]);
        }
        
        return redirect()->back()->withMensagem([
            'class'     =>  'success',
            'text'      =>  'Parceiro atualizado com sucesso.'
        ]);
    }
    
    public function index()
    {
        $parceiros = Parceiro::getParceiros(10);
        return view('admin.listarParceiro')->with([
            'parceiros' => $parceiros
        ]);
    }
}
