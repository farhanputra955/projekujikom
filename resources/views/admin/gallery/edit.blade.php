@extends('argon')

<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Gallery</div>
                <div class="card-body">
                    <form action="{{ route('gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama Gallery</label>
                            <input class="form-control" value="{{ $gallery->judul }}" type="text" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label><br>
                            <img src="{{ asset('assets/img/ponpes/'.$gallery->foto) }}" alt="" height="250px" width="250px">
                            <input type="file" class="form-control" name="foto">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Konten</label>

                            <textarea class="form-control ckeditor 
                            @error('konten') is-invalid @enderror"
                             name="konten" id="editor1" require>
                             {{$gallery->konten}}
                             </textarea>
                             @error('konten')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                             @enderror
                        </div>
                        <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                    <a name="" id="" class="btn btn-md btn-warning" href="{{ url('admin/gallery') }}" role="button">Kembali</a>
              
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection