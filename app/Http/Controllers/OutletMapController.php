<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\zona;

class OutletMapController extends Controller
{
    /**
     * Show the outlet listing in LeafletJS map.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $zona = zona::all();
        return view('lokasi_parkir.map',compact('zona'));
    }
}
