@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Data arsip</h3>

            <div class="box-tools">
              <a href="/superadmin/arsip/create" class="btn btn-flat btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nomor File</th>
                <th>Nama File</th>
                <th>Kategori</th>
                <th>Penyedia</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              @foreach ($data as $key => $item)
              <tr>
                <td>{{$data->firstItem() + $key}}</td>
                <td>{{$item->tanggal}}</td>
                <td>{{$item->no_file}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->kategori->nama}}</td>
                <td>{{$item->penyedia->nama}}</td>
                <td>{{$item->status}}</td>
                <td>
                  <a href="/storage/upload/{{$item->file}}" target="_blank" class="btn btn-flat btn-sm btn-success"><i class="fa fa-download"></i> Download</a>
                  <a href="/superadmin/arsip/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                  <a href="/superadmin/arsip/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-success" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        {{$data->links()}}
        <!-- /.box -->
      </div>
</div>

@endsection
@push('js')

@endpush
