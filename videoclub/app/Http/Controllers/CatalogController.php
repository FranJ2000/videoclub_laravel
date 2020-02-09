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

    function getShow($language,$id) 
    {   //getShow recibe dos parametros: idioma, id. Nos interesa $id.
        $movies = DB::table('movies')->find($id);
    	return view('catalog.show', array('id'=>$movies));
    }

    function getCreate() 
    {
    	return view('catalog.create');
    }

    function getEdit($language,$id)
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
        Movie::create($validarDatos); 
        session()->flash('notif', 'The movie has been inserted correctly.');  
        return redirect(app()->getLocale().'/catalog');
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
        session()->flash('notif', 'The movie has been saved / modified successfully.');
        return redirect('en/catalog/show/'.$id);
    }

    function putRent(Request $request, $id) {
        Movie::whereId($id)->update([
            'rented' => true]);
        session()->flash('notif', 'The movie has been rented correctly.');
        return redirect('en/catalog/show/'.$id);
    }

    function putReturn(Request $request, $id) {
        Movie::whereId($id)->update([
            'rented' => false]);
        session()->flash('notif', 'The movie has been returned successfully.');
        return redirect('en/catalog/show/'.$id);
    }

    function deleteMovie(Request $request, $id) {
        Movie::whereId($id)->delete();
        session()->flash('notif', 'The movie has been successfully deleted.');
        return redirect('en/catalog');
    }
}
