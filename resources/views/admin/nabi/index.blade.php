@extends('backend.srtdash')


@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Nabi & Sahabat Nabi</h5><br>
                <center>
                        <a href="{{ route('nabi.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table">
                    <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama </th>                           
                                <th>Slug</th>
                                
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach ($nabi as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_nabi}}</td>                             
                                <td>{{$data->slug}}</td>
                              
                                <td><img src="{{asset('assets/img/kisah/' .$data->foto. '')}}"
                                    style="width:240px; height:140px;" alt="Foto"></td>

                                    <td style="text-align: center;">
                                    <form action="{{route('nabi.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('nabi.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> <i class="	fa fa-pencil"></i>
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