@extends('backend.srtdash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Data Kisah</div>
                <div class="card-body">
                    <form action="{{ route('kisah.store') }}" method="post">
                        {{ csrf_field() }}

    <div class="form-group">
        <label for="">Kisah</label>
        <input type="text" name="kisah" id="" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('kisah') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
                                @endsection