<?php

namespace App\Http\Controllers\Api;

use App\lokasi_parkir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\lokasi_parkir as lokasi_parkirResource;

class OutletController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $lokasi_parkir = lokasi_parkir::all();

        $geoJSONdata = $lokasi_parkir->map(function ($lokasi_parkir) {
            return [
                'type'       => 'Feature',
                'properties' => new lokasi_parkirResource($lokasi_parkir),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $lokasi_parkir->longitude,
                        $lokasi_parkir->latitude,
                    ],
                ],
            ];
        });
        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
