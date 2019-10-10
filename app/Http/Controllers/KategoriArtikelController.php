<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index(){
    	//Eloquent => ORM (Object Relational Mapping)
    	$listKategoriArtikel=KategoriArtikel::all(); //select * from kategori_artikel

    	//blade
    	return view('kategori_artikel.index',compact('listKategoriArtikel'));
    	//return view( view: 'kategori_artikel.index')->with('data',$listKategoriArtikel);
    }

    public function show($id){
    	//Eloquent
    	//$KategoriArtikel=KategoriArtikel::where('id',$id)->first(); // select * from kategori_artikel where id=$id limit I
    	$KategoriArtikel=KategoriArtikel::find($id);

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

    	return view('kategori_artikel.show',compact('KategoriArtikel'));
    }

    public function create(){
        return view('kategori_artikel.create');
    }

    public function store(Request $request){
        $input= $request->all();

        KategoriArtikel::create($input);

        return redirect(route('kategori_artikel.index'));
    }
    public function edit($id){
        $KategoriArtikel=KategoriArtikel::find($id);

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        return view('kategori_artikel.edit',compact('KategoriArtikel'));
    }
    public function update($id,Request $request){
        $KategoriArtikel=KategoriArtikel::find($id);
        $input= $request->all();

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        $KategoriArtikel->update($input);

        return redirect(route('kategori_artikel.index'));
    }
    public function destroy($id){
        $KategoriArtikel=KategoriArtikel::find($id);

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        $KategoriArtikel->delete();
        return redirect(route('kategori_artikel.index'));
    }
}