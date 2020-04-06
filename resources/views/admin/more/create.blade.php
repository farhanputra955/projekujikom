@extends('backend.srtdash')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Membuat Data Doaharian</div>
                <div class="card-body">
                <form action="{{ route('more.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="berdoa" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Arab</label>
                    <input type="text" name="arab" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Latin</label>
                    <input type="text" name="latin" id="" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="">Artinya</label>
                    <input type="text" name="arti" id="" class="form-control" required>
                </div>
                  <div class="form-group">
                    <label for="">Kategori </label>
                    <select name="doaseharihari_id" class="form-control" required>
                        @foreach($doaseharihari as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_doa }}</option>
                        @endforeach
                      </select>
                    </div>
                <br>
                <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection