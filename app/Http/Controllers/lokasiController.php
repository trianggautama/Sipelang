<?php

namespace App\Http\Controllers;

use App\lokasi_parkir;
use App\jukir;
use App\zona;
use Illuminate\Http\Request;

class lokasiController extends Controller
{

    public function index(){
      $lokasi_parkir = lokasi_parkir::all();
      $zona = zona::all();

      return view('lokasi_parkir.index', compact('lokasi_parkir','zona'));
    }

    public function tambah(){
    //dd('tes');
    $jukir= jukir::all();
    $zona= zona::all();
      return view('lokasi_parkir.tambah',compact('jukir','zona'));

    }

    public function store(Request $request){
       // dd('tes');


    $lokasi_parkir = new lokasi_parkir;
    $lokasi_parkir->zona_id= $request->zona_id;
    $lokasi_parkir->jukir_id= $request->jukir_id;
    $lokasi_parkir->address= $request->address;
    $lokasi_parkir->latitude= $request->latitude;
    $lokasi_parkir->longitude= $request->longitude;
    $lokasi_parkir->creator_id= 1;
    $lokasi_parkir->save();

      return redirect(route('index'));
    }

    public function show( $id ){
        $lokasi_parkir =lokasi_parkir::findOrFail($id);
        return view('lokasi_parkir.show', compact('lokasi_parkir'));
      }

}
