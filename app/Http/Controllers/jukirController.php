<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jukir;

class jukirController extends Controller
{

    public function index(){
        $jukir = jukir::all();
        return view('jukir.index',compact('jukir'));
    }

    public function tambah(Request $request){
        $this->validate(request(),[
            'nama'=>'required',
        ]);
      //  dd($request);
        $jukir = new jukir;

        $FotoExt  = $request->gambar->getClientOriginalExtension();
        $FotoName = $request->nama;
        $gambar     = $FotoName.'.'.$FotoExt;
        $request->gambar->move('images/foto_jukir/', $gambar);

        $jukir->nama= $request->nama;
        $jukir->no_hp= $request->no_hp;
        $jukir->gambar            = $gambar;
        $jukir->save();

          return redirect(route('jukir-index'));
    }

    public function edit( $id ){
        $jukir=jukir::findOrFail($id);
        return view('jukir.edit',compact('jukir'));
    }
    public function update(Request $request, $id  ){
        $jukir=jukir::findOrFail($id);
        $jukir->nama= $request->nama;
        $jukir->no_hp= $request->no_hp;
        $jukir->save();
        return redirect(route('jukir-index'));
    }

    public function detail( $id ){
        dd('detail belum dibuat :)');
    }

    public function hapus   ( $id ){
        $jukir=jukir::findOrFail($id);
        $jukir->delete();
        return redirect(route('jukir-index'));
    }
}
