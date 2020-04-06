@extends('backend.srtdash')

<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Walisongo</div>
                <div class="card-body">
                    <form action="{{ route('walisongo.update', $walisongo->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama Walisongo</label>
                            <input class="form-control" value="{{ $walisongo->nama_walisongo }}" type="text" name="nama_walisongo">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label><br>
                            <img src="{{ asset('assets/img/walisongo/'.$walisongo->foto) }}" alt="" height="250px" width="250px">
                            <input type="file" class="form-control" name="foto">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Konten</label>

                            <textarea class="form-control ckeditor 
                            @error('konten') is-invalid @enderror"
                             name="konten" id="editor1" require>
                             {{$walisongo->konten}}
                             </textarea>
                             @error('konten')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                             @enderror
                        </div>
                        <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                    <a name="" id="" class="btn btn-md btn-warning" href="{{ url('admin/walisongo') }}" role="button">Kembali</a>
              
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection