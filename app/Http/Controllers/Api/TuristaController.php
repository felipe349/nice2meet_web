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

class TuristaController extends Controller
{
    // /**
    //  * @method POST
    //  */
    // public function store(TuristaRequest $request)
    // {
    //     $turista = Turista::createTurista($request->all());
    //     return \Response::json($turista);
    // }
    
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
        
        if(!$turista) {
            return response()->json([
              'error' => $turista
            ], 401);
        }
        
        if (!\Hash::check($credentials['password'], $turista->password)){
            return response()->json([
                'error' =>  'Invalid credentials'
            ], 401);
        }
        
        // Generate Token
        echo 'oi';
        $token = JWTAuth::fromUser($turista);
        
        
        
        // Get expiration time
        $objectToken = JWTAuth::setToken($token);
        
        $teste = $objectToken->getToken();
        
        echo $token;
        $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');
        echo 'oi';
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::decode()->get('exp')
        ]);
    }
}