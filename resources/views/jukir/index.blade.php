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
            Data Juru Parkir
        </h3>
        <a href="##tambahdata" data-toggle="modal"data-target="#tambahdata" class="btn btn-sm btn-success" style="margin-bottom:15px;">Tambah Data  </a>

        <div class="card">

            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th> Nama</th>
                        <th>No Hp</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                @php
                    $no=1;
                @endphp
                <tbody>
                    @foreach ($jukir as $j)

                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{$j->nama}}</td>
                    <td>{{$j->no_hp}}</td>

                        <td class="text-center">
                            <a href="{{ route('detail-zona', ['id'=>$j->id]) }}" class="btn btn-sm btn-secondary" >Info</a>
                            <a href="{{ route('edit-jukir', ['id'=>$j->id]) }}" class="btn btn-sm btn-primary " >Ubah</a>
                            <a href="{{ route('hapus-jukir', ['id'=>$j->id]) }}" class="btn btn-sm btn-danger" >Hapus</a>

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
          <form  method="post" action="" enctype="multipart/form-data">

            <div class="form-group">
              <input type="text" name="nama"  class="form-control" placeholder="Nama Jukir"/>
            </div>
            <div class="form-group">
                    <input type="text" name="no_hp"  class="form-control" placeholder="No Hp"/>
            </div>
            <div class="form-group">
                <label for="">Foto Jukir</label><br>
                    <input type="file" name="gambar" />
            </div>
            <div class="form-group">

             <div class="text-right">

               <input class="btn btn-primary" type="submit" name="submit" value="simpan">
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
