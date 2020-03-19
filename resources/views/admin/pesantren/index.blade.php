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
            <a class="nav-link " href="{{ url('admin/foto') }}">
              Gallery
            </a>
          </li>
        </ul>
@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Pesantren</h5><br>
                <center>
                        <a href="{{ route('pesantren.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table">
                    <thead class="thead-dark">
                            <tr>
                                <th>Nama Pesantren</th>                           
                                <th>Email</th>
                                
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesantren as $data)
                            <tr>
                                <td>{{$data->judul}}</td>                             
                                <td>{{$data->email}}</td>
                              
                                <td><img src="{{asset('assets/img/ponpes/' .$data->foto. '')}}"
                                    style="width:240px; height:140px;" alt="Foto"></td>

								<td style="text-align: center;">
                                    <form action="{{route('pesantren.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('pesantren.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> <i class="	fa fa-pen"></i>
                                    </a>
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="zmdi zmdi-delete  btn-rounded btn-floating btn btn-dangerbtn btn-danger btn-outline"> <i class="	fa fa-trash"></i></button>
									</form>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection