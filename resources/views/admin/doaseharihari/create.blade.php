@extends('backend.srtdash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Kategori Doa</div>
                <div class="card-body">
                    <form action="{{ route('doaseharihari.store') }}" method="post">
                        {{ csrf_field() }}

    <div class="form-group">
        <label for="">Kategori Doa</label>
        <input class="form-control" type="text" name="doa">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('doa') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
                                @endsection