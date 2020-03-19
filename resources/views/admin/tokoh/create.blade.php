
@extends('argon')

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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Data Profil Murid</div>
                <div class="card-body">
                    <form action="{{ route('tokoh.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Nama Tokoh</label>
                            <input class="form-control" type="text" name="nama_tokoh">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                            <div class="form-group">
                            <label>Konten</label>
                            <textarea id="ck" rows="8" cols="50" type="text" name="konten"></textarea>
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
