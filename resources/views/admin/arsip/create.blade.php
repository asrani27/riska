@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/superadmin/arsip" class="btn btn-flat btn-success"><i class="fa fa-backward"></i> Kembali</a> <br /> <br />
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="post" action="/superadmin/arsip/create" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No File</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_file" value="{{$no_file}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama File</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Penyedia</label>
                        <div class="col-sm-10">
                            <select name="penyedia_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($penyedia as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kasi</label>
                        <div class="col-sm-10">
                            <select name="kasi_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($kasi as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kepala</label>
                        <div class="col-sm-10">
                            <select name="kepala_id" class="form-control" required>
                                <option value="">-pilih-</option>
                                @foreach ($kepala as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ilustrasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="illustrasi" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> File</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="status" required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-save"></i> Simpan Data</button>
                </div>
                <!-- /.box-footer -->
            </form>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
@push('js')

@endpush