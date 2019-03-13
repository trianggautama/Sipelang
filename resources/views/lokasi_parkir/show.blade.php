@extends('layouts.app')

@section('title', __('outlet.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Detail Lokasi
            <div class="float-right">
            <a  class="btn btn-sm btn-primary right" href=""> Edit</a>
            <a  class="btn btn-sm btn-danger right" href="{{ route('index') }}"> kembali</a>
            </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                        <img class=" img-responsive" style="width:90%; height:auto; margin-bottom:20px;" src="{{asset('/images/foto_jukir/'.$lokasi_parkir->jukir->gambar)}}">
                </div>
                <table class="table table-sm">
                    <tbody>
                        <tr><td>Nama Jukir</td><td>{{ $lokasi_parkir->jukir->nama }}</td></tr>
                        <tr><td>No Hp</td><td>{{ $lokasi_parkir->jukir->no_hp }}</td></tr>
                        <tr><td>Kode Zona</td><td>{{ $lokasi_parkir->zona->kode }}</td></tr>
                        <tr><td>Lokasi Parkir</td><td>{{ $lokasi_parkir->address }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Lokasi Parkir</div>
            @if ($lokasi_parkir->coordinate)
            <div class="card-body" id="mapid"></div>
            @else
            <div class="card-body">{{ __('outlet.no_coordinate') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 400px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $lokasi_parkir->latitude }}, {{ $lokasi_parkir->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $lokasi_parkir->latitude }}, {{ $lokasi_parkir->longitude }}]).addTo(map)
        .bindPopup('{!! $lokasi_parkir->map_popup_content !!}');
</script>
@endpush
