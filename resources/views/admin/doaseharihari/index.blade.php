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
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Doa</h5><br>
                <center>
                        <a href="{{ route('doaseharihari.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                <table class=”zebra-table“>
                    <table id="datatable" class="table ">
                    <thead class="thead-dark">
                            <tr>
                                <th>Kategori Doa</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doaseharihari as $data)
                            <tr>
                                <td>{{$data->nama_doa}}</td>
                                <td>{{$data->slug}}</td>
								<td style="text-align: center;">
                                    <form action="{{route('doaseharihari.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
                                     
									<a href="{{route('doaseharihari.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> <i class="	fa fa-pen"></i>
                                    </a>   
                                    <a href="{{route('doaseharihari.show', $data->id)}}"
										class="zmdi zmdi-eye btn btn-primary btn-rounded btn-floating btn-outline"> <i class="	fa fa-eye"></i> 
                                    </a >
                                    <form action="{{ route('doaseharihari.destroy', $data->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn -sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
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