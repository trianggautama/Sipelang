@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>
            Zona Lokasi Parkir
        </h3>
        <a href="##tambahdata" data-toggle="modal"data-target="#tambahdata" class="btn btn-sm btn-success" style="margin-bottom:15px;">Tambah Data  </a>

        <div class="card">

            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Zona</th>
                        <th>Keterangan</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                @php
                    $no=1;
                @endphp
                <tbody>
                    @foreach ($zona as $z)

                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{$z->kode}}</td>
                    <td>{{$z->keterangan}}</td>

                        <td class="text-center">
                            <a href="{{ route('detail-zona', ['id'=>$z->id]) }}" class="btn btn-sm btn-secondary" >Info</a>
                            <a href="{{ route('edit-zona', ['id'=>$z->id]) }}" class="btn btn-sm btn-primary " >Ubah</a>
                            <a href="{{ route('hapus-zona', ['id'=>$z->id]) }}" class="btn btn-sm btn-danger" >Hapus</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="tambahdata" class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h4>Tambah Data</h4>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- form login -->
          <form  method="post" action="">

            <div class="form-group">
              <input type="text" name="kode"  class="form-control" placeholder="Kode Zona"/>
            </div>
            <div class="form-group">
                <textarea name="keterangan" id=""   class="form-control" placeholder="keterangan"></textarea>
             </div>
            <div class="form-group">

             <div class="text-right">

               <input class="btn btn-primary" type="submit" name="submit" value="Submit">
               {{csrf_field() }}
             </div>
           </div>

          </form>
          <!-- end form login -->
        </div>
          </div>
          <!-- /.box -->
        </div>

@endsection
