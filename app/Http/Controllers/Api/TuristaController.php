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
        $img = $request['img'];
        
        $turista = Turista::find($request['id_turista']);
        
        if($nome != ""){
            $turista->nm_turista = $nome;
        }
        if($dtNasc != ""){
            $turista->dt_nascimento = $dtNasc;
        }
        if($img != ""){
            $turista->img = $img;
        }
        
        $turista->save();
        
        return 1;
    }
    
    public function tutorial(Request $request){
        $id = $request['id_turista'];
        Turista::where('id_turista', $id)->update(['ic_tutorial' => 1]);
    }
    
    public function changePassword(Request $request){
        $id = $request['id_turista'];
        $oldPass = $request['password'];
        $newPass = $request['newPassword'];
        $turista = Turista::where('id_turista', $id)->first();
        if(Hash::check($oldPass, $turista['password'])) {;
            $turista['password'] = bcrypt($newPass);
            $turista->save();
            return 1;
        }
        return 0;
    }
}