<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\KategoriGaleri;
use DB;
use Mockery\Exception;

class GaleriController extends Controller
{
    public function index(){
    	//Eloquent => ORM (Object Relational Mapping)
    	$listGaleri=Galeri::all(); //select * from galeri

    	//blade
    	return view('galeri.index',compact('listGaleri'));
    	//return view( view: 'galeri.index')->with('data',$listGaleri);
    }

    public function show($id){
    	//Eloquent
    	//$Galeri=Galeri::where('id',$id)->first(); // select * from galeri where id=$id limit I
    	$Galeri=Galeri::find($id);

        if(empty($Galeri)){
            return redirect(route('galeri.index'));
        }

    	return view('galeri.show',compact('Galeri'));
    }
    public function create(){

        $KategoriGaleri= KategoriGaleri::pluck('nama','id');

        return view('galeri.create',compact('KategoriGaleri'));
    }
    public function store(Request $request){

        try{
        DB::beginTransaction();

        $input= $request->except('path');

        $galeri=galeri::create($input);

        if ($request->has('path')){
            $file=$request->file('path');
            $filename=$galeri->id.'.'.$file->getClientOriginalExtension();
            $path=$request->path->storeAs('public/galeri',$filename,'local');
            $galeri->path="storage". substr($path,strpos($path, '/'));
            $galeri->save();
         }

         DB::commit();

        }catch(Exception $e){
        DB::rollBack();
        return $e->getMessage();
        }

        

        return redirect(route ('galeri.index'));
    }
    public function edit($id){
        $Galeri=Galeri::find($id);

        $KategoriGaleri= KategoriGaleri::pluck('nama','id');

        if(empty($Galeri)){
            return redirect(route('galeri.index'));
        }

        return view('galeri.edit',compact('Galeri','KategoriGaleri'));
    }
    public function update($id,Request $request){
        $Galeri=Galeri::find($id);
        $input= $request->all();

        if(empty($Galeri)){
            return redirect(route('galeri.index'));
        }

        $Galeri->update($input);

        return redirect(route('galeri.index'));
    }
    public function destroy($id){
        $Galeri=Galeri::find($id);

        if(empty($Galeri)){
            return redirect(route('galeri.index'));
        }

        $Galeri->delete();
        return redirect(route('galeri.index'));
    }
    public function trash(){
        $listGaleri=Galeri::onlyTrashed(); //select * from galeri

        //blade
        return view('galeri.index',compact('listGaleri'));
        //return view( view: 'galeri.index')->with('data',$listGaleri);
    }
}
