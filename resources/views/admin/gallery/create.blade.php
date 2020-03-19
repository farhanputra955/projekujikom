@extends('argon')

<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');
</script>

@section('sidebar')
<ul class="navbar-nav">
          <li class="nav-item  class=" active"">
          <a class=" nav-link active "> <i class="ni ni-tv-2 text-primary"></i> MENU</a> 
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/artikel') }}">
             Artikel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/kategori') }}">
              Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/pesantren') }}">
               Pesantren
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/provinsi') }}">
               Provinsi
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/more') }}">
              Doa Harian
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/doaseharihari') }}">
              Kategori Doa 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/kerajaan') }}">
             Kerajaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/nabi') }}">
             Kisah Kisah
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/kisah') }}">
             Kategori Kisah
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/gallery') }}">
              Gallery
            </a>
          </li>
        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Membuat Data Gallery</div>
                <div class="card-body">
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Judul Gallery</label>
              <input type="text" name="judul" id="" class="form-control" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                  </div>
                  <div class="form-group">
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
                 
                    <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                    
                    <a name="" id="" class="btn btn-md btn-warning" href="{{route('gallery.index')}}" role="button">Kembali</a>
                
              </form>
              
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection