
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
                <div class="card-header">Membuat Data Profil Murid</div>
                <div class="card-body">
                    <form action="{{ route('walisongo.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Nama Walisongo</label>
                            <input class="form-control" type="text" name="nama_walisongo">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto">
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
