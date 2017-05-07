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
    /**
     * @method POST
     */
    public function store(TuristaRequest $request)
    {
        $turista = Turista::createTurista($request->all());
        return \Response::json($turista);
    }
    
    public function getTurista(Request $request)
    {
        return response()->json(['turista' => JWTAuth::attempt($request->only(['email', 'password']))]);
    }
}
