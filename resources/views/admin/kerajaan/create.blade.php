
@extends('argon')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Data Profil Murid</div>
                <div class="card-body">
                    <form action="{{ route('kerajaan.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Nama kerajaan</label>
                            <input class="form-control" type="text" name="nama_kerajaan">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                            <div class="form-group">
                            <label>Konten</label>
                            <textarea id="ck" rows="9" cols="60" type="text" name="konten"></textarea>
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
