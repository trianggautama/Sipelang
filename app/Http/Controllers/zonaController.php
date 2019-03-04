<?php

namespace App\Http\Controllers;

use App\zona;
use Illuminate\Http\Request;

class zonaController extends Controller
{

    public function index(){

        $zona = zona::all();

        return view ('zona.index',compact('zona'));
    }

    public function tambah(Request $request){
        $this->validate(request(),[
            'kode'=>'required',
            'keterangan'=>'required',
        ]);

        $zona = new zona;

        $zona->kode= $request->kode;
        $zona->keterangan= $request->keterangan;
        $zona->save();

          return redirect(route('zona-index'));
    }

    public function edit( $id ){
        $zona=zona::findOrFail($id);
        return view('zona.edit',compact('zona'));
    }
    public function update(Request $request, $id  ){
        $zona=zona::findOrFail($id);
        $zona->kode= $request->kode;
        $zona->keterangan= $request->keterangan;
        $zona->save();
        return redirect(route('zona-index'));
    }

    public function detail( $id ){
        dd('detail belum dibuat :)');
    }

    public function hapus   ( $id ){
        $zona=zona::findOrFail($id);
        $zona->delete();
        return redirect(route('zona-index'));
    }
}
