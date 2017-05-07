<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TuristaRequest;

use App\Models\Turista;

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
}
