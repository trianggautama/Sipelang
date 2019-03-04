<?php

namespace App\Http\Controllers;

use App\lokasi_parkir;
use Illuminate\Http\Request;

class lokasiController extends Controller
{
    
    public function index(){
      $lokasi_parkir = lokasi_parkir::all();
            
      return view('lokasi_parkir.index', compact('lokasi_parkir'));
    }

    public function tambah(){
    //dd('tes');
      return view('lokasi_parkir.tambah');

    }

    public function store(Request $request){
      $this->validate(request(),[
        'name'=>'required',
        'alamat'=>'required',
    ]);

    $lokasi_parkir = new lokasi_parkir;
    $FotoExt  = $request->gambar->getClientOriginalExtension();
    $FotoName = $request->name;
    $gambar     = $FotoName.'.'.$FotoExt;
    $request->gambar->move('images/', $gambar);

    $lokasi_parkir->name= $request->name;
    $lokasi_parkir->address= $request->alamat;
    $lokasi_parkir->latitude= $request->latitude;
    $lokasi_parkir->longitude= $request->longitude;
    $lokasi_parkir->creator_id= 1;
    $lokasi_parkir->gambar            = $gambar;
    $lokasi_parkir->save();
   
      return redirect(route('index'));
    }

    public function show( $id ){
        $lokasi_parkir =lokasi_parkir::findOrFail($id);
        return view('lokasi_parkir.show', compact('lokasi_parkir'));
      }
  
}
