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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Membuat Data Doaharian</div>
                <div class="card-body">
                <form action="{{ route('more.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="berdoa" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Arab</label>
                    <input type="text" name="arab" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Latin</label>
                    <input type="text" name="latin" id="" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="">Artinya</label>
                    <input type="text" name="arti" id="" class="form-control" required>
                </div>
                  <div class="form-group">
                    <label for="">Kategori </label>
                    <select name="doaseharihari_id" class="form-control" required>
                        @foreach($doaseharihari as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_doa }}</option>
                        @endforeach
                      </select>
                    </div>
                <br>
                <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection