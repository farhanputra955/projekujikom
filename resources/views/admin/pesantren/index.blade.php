@extends('argon')

{{-- @section('css')
        <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('js')
        <script src="{{asset('assets/backend/assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/backend/assets/js/components/datatables-init.js')}}"></script>
@endsection --}}

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables pesantren</h5><br>
                <center>
                        <a href="{{ route('pesantren.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table">
                    <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>                           
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