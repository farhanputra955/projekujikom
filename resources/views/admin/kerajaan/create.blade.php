
@extends('backend.srtdash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Data Kerajaan</div>
                <div class="card-body">
                    <form action="{{ route('kerajaan.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Nama Kerajaan</label>
                             <input type="text" name="nama_kerajaan" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="">Konten</label>
                        <textarea name="konten" id="texteditor" cols="30" rows="9" class="form-control" required></textarea>
                      </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info">
                            Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
