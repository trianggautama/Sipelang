@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')

<div class="row">
    <div class="col-md-12" style="margin-bottom:15px;">
        <h3>
            Data Lokasi Parkir <small>({{$lokasi_parkir->count()}} Lokasi)</small>
        </h3>
    </div>
        <div class="col-md-9">
                <a href="{{ route('tambah-lokasi') }}" class="btn btn-sm btn-success" style="margin-bottom:15px;">Tambah Lokasi Parkir  </a>
                <a href="" class="btn btn-sm btn-primary" style="margin-bottom:15px;"> <i class="fas fa-user"></i> Cetak Laporan </a>
        </div>

                <div class="col-md-12">

        <div class="card" style="padding:20px;">

            <table class="table table-responsive-sm" id="myTable">
                <thead>
                    <tr>
                        <th>Nama Jukir</th>
                        <th>Kode Zona</th>
                        <th>Lokasi</th>
                        <th>{{ __('outlet.latitude') }}</th>
                        <th>{{ __('outlet.longitude') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lokasi_parkir as $key => $lp)
                    <tr>
                        <td>{{ $lp->jukir->nama }}</td>
                        <td>{{ $lp->zona->kode }}</td>
                        <td>{{ $lp->address }}</td>
                        <td>{{ $lp->latitude }}</td>
                        <td>{{ $lp->longitude }}</td>
                        <td class="text-center">
                            <a href="{{ route('show-lokasi', ['id'=>$lp->id]) }}" class="btn btn-sm btn-primary" >{{ __('app.show') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
