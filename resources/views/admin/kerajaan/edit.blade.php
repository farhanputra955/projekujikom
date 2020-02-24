@extends('argon')
@section('css')
      <link rel="stylesheet" href="{{asset('select2/dist/css/select2.min.css')}}">
@endsection

@section('js')
     <script src="{{asset('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/js/components/select2-init.js')}}"></script>
    <script>
        CKEDITOR.replace( 'ck' );
    </script>
    <script>
        $(document).ready(function () {
            $('#select2').select2();
        })
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Profil Murid</div>
                <div class="card-body">
                    <form action="{{ route('kerajaan.update', $kerajaan->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama Murid</label>
                            <input class="form-control" value="{{ $kerajaan->judul }}" type="text" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label><br>
                            <img src="{{ asset('assets/img/kerajaan/'.$kerajaan->foto) }}" alt="" height="250px" width="250px">
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                                <select name="nama" class="form-control">
                                @foreach($kategori as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $kerajaan->kategori->id ==
                                            $data->id ? 'selected="selected"' : '' }}>
                                        {{ $data->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Tempat, Tanggal Lahir</label>
                            <textarea class="form-control" id="ck" rows="8" cols="30" type="text" name="konten">{{ $kerajaan->konten }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info">
                            Simpan Data
                            </button>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('kerajaan') }}" class="btn btn-outline-info">Kembali</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection