<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use DB;

class CatalogController extends Controller
{

    function getIndex() 
    {
        $movies = DB::table('movies')->get();
    	return view('catalog.index', ['arrayPeliculas'=>$movies]);
    }

    function getShow($id) 
    {   
        $movies = DB::table('movies')->find($id);
    	return view('catalog.show', array('id'=>$movies));
    }

    function getCreate() 
    {
    	return view('catalog.create');
    }

    function getEdit($id)
    {
        $movies = DB::table('movies')->find($id);
    	return view('catalog.edit', array('id'=>$movies));
    }

    function postCreate(Request $request){   
        $validarDatos = $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string',
            'director' => 'required|string',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);
        $id = Movie::create($validarDatos); 
        session()->flash('notif', 'La película se ha insertado correctamente.');  
        return redirect('catalog');
    }

    function putEdit(Request $request, $id)
    {
        $validarDatos = $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string',
            'director' => 'required|string',
            'poster' => 'required',
            'synopsis' => 'required'
        ]);
        Movie::whereId($id)->update($validarDatos);
        session()->flash('notif', 'La película se ha guardado/modificado correctamente.');
        return redirect('catalog/show/'.$id);
    }

    function putRent(Request $request, $id) {
        Movie::whereId($id)->update([
            'rented' => true]);
        session()->flash('notif', 'La película se ha alquilado correctamente.');
        return redirect('catalog/show/'.$id);
    }

    function putReturn(Request $request, $id) {
        Movie::whereId($id)->update([
            'rented' => false]);
        session()->flash('notif', 'La película se ha devuelto correctamente.');
        return redirect('catalog/show/'.$id);
    }

    function deleteMovie(Request $request, $id) {
        Movie::whereId($id)->delete();
        session()->flash('notif', 'La película se ha eliminado correctamente.');
        return redirect('catalog');
    }
}
