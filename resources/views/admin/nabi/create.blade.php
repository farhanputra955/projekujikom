@extends('backend.srtdash')

<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');
</script>


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Membuat Data Nabi & Sahabat Nabi</div>
                <div class="card-body">
                <form action="{{ route('nabi.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Nama Nabi & Sahabat Nabi</label>
              <input type="text" name="nama_nabi" id="" class="form-control" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                  </div>
            <div class="form-group">
                            <label for="">Konten</label>

                            <textarea class="form-control ckeditor 
                            @error('konten') is-invalid @enderror"
                             name="konten" id="editor1" require>
                             </textarea>
                             @error('konten')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                             @enderror
                        </div>
                 
                  <div class="form-group">
                    <label for="">Kategori Kisah</label>
                    <select name="kisah_id" class="form-control" required>
                        @foreach($kisah as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_kisah }}</option>
                        @endforeach
                      </select>
                    </div>
                <br>
                    <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                    <a name="" id="" class="btn btn-md btn-warning" href="{{route('nabi.index')}}" role="button">Kembali</a>
              </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection