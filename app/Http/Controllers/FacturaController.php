<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    public function obtener($id = null)
    {
        if ($id === null) {
            return Factura::with(["cliente", "facturadetalles"])->get();

        } else {
            return Factura::with(["cliente", "facturadetalles"])->find($id);
        }
    }
    public function login(Request $request)
    {
        $body = json_decode($request->getContent(), true);
        if (Auth::attempt(['email' => $body['email'] ?? '', 'password' => $body['password'] ?? ''])) {
      
            return [
                'nombre' => Auth::user()->name,
                'rol' => Auth::user()->rol,
                'caracteristica' => Auth::user()->caracteristica // 'leer,escribir'
                ,
                'token' => Auth::user()->createToken('name', explode(",",Auth::user()->caracteristica ))->plainTextToken
            ];
        }
        return null;
    }
}