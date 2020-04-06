@extends('backend.srtdash')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Membuat Data pesantren</div>
                <div class="card-body">
                <form action="{{ route('pesantren.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Nama pesantren</label>
              <input type="text" name="judul" id="" class="form-control" aria-describedby="helpId" required>
            </div>
                  <div class="form-group">
                    <label for="">Konten</label>
                    <textarea name="konten" id="texteditor" cols="30" rows="9" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Provinsi</label>
                    <select name="provinsi_id" class="form-control" required>
                        @foreach($provinsi as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_provinsi }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" name="telepon" id="" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" name="website" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Maps</label>
                    <input type="text" name="maps" id="" class="form-control" required>
                </div>
                <br>
                    <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                    <a name="" id="" class="btn btn-md btn-warning" href="{{route('pesantren.index')}}" role="button">Kembali</a>
              </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection