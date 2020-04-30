@extends('backend.srtdash')


<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mengubah Data Nabi & Sahabat Nabi</div>
                <div class="card-body">
                    <form action="{{ route('nabi.update', $nabi->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama Nabi atau Sahabat Nabi</label>
                            <input class="form-control" value="{{ $nabi->nama_nabi }}" type="text" name="nama_nabi">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label><br>
                            <img src="{{ asset('assets/img/kisah/'.$nabi->foto) }}" alt="" height="250px" width="250px">
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="">Konten</label>

                            <textarea class="form-control ckeditor 
                            @error('konten') is-invalid @enderror"
                             name="konten" id="editor1" require>
                             {{$nabi->konten}}
                             </textarea>
                             @error('konten')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                             @enderror
                        </div>

                    <div class="form-group">
                    <label for="">Kategori Kisah</label>
                    <select class="form-control" name="id_kisah">
                    @foreach ($kisah as $data)
                    <option value="{{ $data->id }}" 
                    {{$nabi->id_kisah == $data->id ? ' selected="selected" ':''}}>{{ $data->nama_kisah }}
                    </option>
                    @endforeach
                    </select>
                    </div>
                     
                        <br>
                        <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                        <a name="" id="" class="btn btn-md btn-warning" href="{{ url('admin/nabi') }}" role="button">Kembali</a>
              
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection