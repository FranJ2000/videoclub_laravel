<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class APICatalogController extends Controller
{
    function index() 
    {
    	return response()->json(Movie::all());
    }

    function show($id) 
    {
    	return response()->json(Movie::find($id));
    }

    function store(Request $request) {
        $title = $request->input('title');
        $year = $request->input('year');
        $director = $request->input('director');
        $poster = $request->input('poster');
        $rented = $request->input('rented');
        $synopsis = $request->input('synopsis');

        $data = [
            'title' => $title,
            'year' => $year,
            'director' => $director,
            'poster' => $poster,
            'rented' => $rented,
            'synopsis' => $synopsis
        ];
        return response()->json(Movie::create($data));
    } //No se ha probado

    function update(Request $request, $id) {
        $title = $request->input('title');
        $year = $request->input('year');
        $director = $request->input('director');
        $poster = $request->input('poster');
        $rented = $request->input('rented');
        $synopsis = $request->input('synopsis');
        
        Movie::whereId($id)->update([
            'title' => $title,
            'year' => $year,
            'director' => $director,
            'poster' => $poster,
            'rented' => $rented,
            'synopsis' => $synopsis
        ]);
        return response()->json(Movie::find($id));
    } //No se ha probado

    function destroy($id) {
    	return response()->json(Movie::whereId($id)->delete()).'La película se ha eliminado correctamente.';
    }

    function putRent($id) {
    	Movie::whereId($id)->update([
            'rented' => true]);
    	return response()->json( ['error' => false, 'msg' => 'La película se ha marcado como alquilada' ] );
    } //Con metodo get funciona

    function putReturn($id) {
    	Movie::whereId($id)->update([
            'rented' => false]);
    	return response()->json( ['error' => false, 'msg' => 'La película se ha marcado como disponible' ] );
    } //Con metodo get funciona
}
