@extends('argon')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/js/components/select2-init.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        $(document).ready(function () {
        $('#select2').select2();
    })
    </script>
@endsection

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
              <label for="">Judul pesantren</label>
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
                    <label for="">Nama provinsi</label>
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