<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class PaginasController extends Controller
{
    public function nosotros() {
        $nombre='Francisco';
        return view('nosotros')->with('nombreenviado',$nombre);
    }

    public function contacto() {
        return view('contacto')->with(['nombre'=>'Fran','apellido'=>'Rodriguez']);
    }
}
