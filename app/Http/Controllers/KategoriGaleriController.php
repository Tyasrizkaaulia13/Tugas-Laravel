<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriGaleri;

class KategoriGaleriController extends Controller
{
    public function index(){
        //Eloquent => ORM (Object Relational Mapping)
        $listKategoriGaleri=KategoriGaleri::all(); //select * from kategori_galeri

        //blade
        return view('kategori_galeri.index',compact('listKategoriGaleri'));
        //return view( view: 'kategori_galeri.index')->with('data',$listKategoriGaleri);
    }

    public function show($id){
        //Eloquent
        //$KategoriGaleri=KategoriGaleri::where('id',$id)->first(); // select * from kategori_galeri where id=$id limit I
        $KategoriGaleri=KategoriGaleri::find($id);

        if(empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        return view('kategori_galeri.show',compact('KategoriGaleri'));
    }

    public function create(){
        return view('kategori_galeri.create');
    }

    public function store(Request $request){
        $input= $request->all();

        KategoriGaleri::create($input);

        return redirect(route('kategori_galeri.index'));
    }
    public function edit($id){
        $KategoriGaleri=KategoriGaleri::find($id);

        if(empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        return view('kategori_galeri.edit',compact('KategoriGaleri'));
    }
    public function update($id,Request $request){
        $KategoriGaleri=KategoriGaleri::find($id);
        $input= $request->all();

        if(empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        $KategoriGaleri->update($input);

        return redirect(route('kategori_galeri.index'));
    }
    public function destroy($id){
        $KategoriGaleri=KategoriGaleri::find($id);

        if(empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        $KategoriGaleri->delete();
        return redirect(route('kategori_galeri.index'));
    }
    public function trash(){
        $listKategoriGaleri=KategoriGaleri::onlyTrashed(); //select * from kategori_galeri

        //blade
        return view('kategori_galeri.index',compact('listKategoriGaleri'));
        //return view( view: 'kategori_galeri.index')->with('data',$listKategoriGaleri);
    }
}