@extends('argon')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Kisah</div>
                <div class="card-body">
                    <form action="{{ route('kisah.update', $kisah->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama Kisah</label>
                            <input class="form-control" value="{{ $kisah->nama_kisah }}" type="text" name="nama_kisah">
                        </div>
                     
                        <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                    <a name="" id="" class="btn btn-md btn-warning" href="{{ url('admin/kisah') }}" role="button">Kembali</a>
              
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection