<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Form Request
use App\Http\Requests\TuristaRequest;

// Models
use App\Models\Turista;

// Dependency injections
use JWTAuth;

use Hash;

class TuristaController extends Controller
{
    // /**
    //  * @method POST
    //  */
     public function store(Request $request)
     {
         $turista = Turista::createTurista($request->all());
         //return \Response::json($turista);
     }
    
    // public function postLogin(Request $request)
    // {
    //     return response()->json(['turista' => JWTAuth::attempt($request->only(['email', 'password']))]);
    // }
    
    // public function get_user_details(Request $request)
    // {
    // 	$user = JWTAuth::toUser($request->input('token_usuario'));
    //     return response()->json(['result' => $user]);
    // }
    
    public function authenticate(Request $request) {
        $credentials = $request->only('email', 'password');
        
        $turista = Turista::where('nm_email_turista', $credentials['email'])->first();

        if($turista){
            
            if(Hash::check( $request['password'] , $turista['password'] )){
                    return response()->json([
                        'logado' => 1,
                        'turista' => $turista
                    ]);
            } else {
                return response()->json([
                    'error' => 'Senha incorreta'
                ]);  
            }
            
        } else {
            return response()->json([
                'error' => 'Login não encontrado'
            ]);
        }
        // // Generate Token
        // $token = JWTAuth::fromUser($turista);

        // // Get expiration time
        // $objectToken = JWTAuth::setToken($token);
        
        // $teste = $objectToken->getToken();
        
        
        // $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');
        
        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'bearer',
        //     'expires_in' => JWTAuth::decode()->get('exp')
        // ]);
    }
    
    public function edit(Request $request){
        $nome = $request['nome'];
        $dtNasc = $request['nascimento'];
        
        $turista = Turista::find($request['id_turista']);
        
        if($nome != ""){
            $turista->nm_turista = $nome;
        }
        if($dtNasc != ""){
            $turista->dt_nascimento = $dtNasc;
        }
        
        $turista->save();
        
        return 1;
    }
}