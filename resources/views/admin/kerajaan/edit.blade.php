@extends('argon')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Kerajaan</div>
                <div class="card-body">
                    <form action="{{ route('kerajaan.update', $kerajaan->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama Kerajaan</label>
                            <input class="form-control" value="{{ $kerajaan->nama_kerajaan }}" type="text" name="nama_kerajaan">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label><br>
                            <img src="{{ asset('assets/img/kerajaan/'.$kerajaan->foto) }}" alt="" height="250px" width="250px">
                            <input type="file" class="form-control" name="foto">
                        </div>
                        
                        <div class="form-group">
                            <label>Konten</label>
                            <textarea class="form-control" id="ck" rows="8" cols="30" type="text" name="konten">{{ $kerajaan->konten }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info">
                            Simpan Data
                            </button>
                        <div class="form-group">
                            <a href="{{ url('admin/kerajaan') }}" class="btn btn-outline-info">Kembali</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection