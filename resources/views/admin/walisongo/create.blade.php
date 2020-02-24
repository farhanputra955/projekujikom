
@extends('argon')

<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
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
                            <label>Konten</label>
                            <textarea id="konten" class="form-control" name="konten" rows="10" cols="50"></textarea>                        </div>
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
