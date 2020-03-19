@extends('argon')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data kategori</div>
                <div class="card-body">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama kategori</label>
                            <input class="form-control" value="{{ $kategori->nama_kategori }}" type="text" name="nama_kategori">
                        </div>
                     
                        <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                    <a name="" id="" class="btn btn-md btn-warning" href="{{ url('admin/kategori') }}" role="button">Kembali</a>
              
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection