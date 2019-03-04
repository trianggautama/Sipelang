@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\lokasi_parkir)
            <a href="{{ route('outlets.create') }}" class="btn btn-success">{{ __('outlet.create') }}</a>
        @endcan
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>
            Data Lokasi Parkir
        </h3>
        <a href="{{ route('tambah-lokasi') }}" class="btn btn-sm btn-success" style="margin-bottom:15px;">Tambah Data  </a>

        <div class="card">

            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>Nama Jukir</th>
                        <th>Lokasi</th>
                        <th>{{ __('outlet.latitude') }}</th>
                        <th>{{ __('outlet.longitude') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lokasi_parkir as $key => $lp)
                    <tr>
                        <td>{{ $lp->name }}</td>
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
