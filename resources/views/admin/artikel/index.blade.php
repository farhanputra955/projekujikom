@extends('backend.srtdash')



@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header" style="color:#ffff">Data Tables Artikel</h5><br>
                <center>
                        <a href="{{ route('artikel.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table">
                    <thead class="thead-dark">
                   
                            <tr>
                                <th class="table-light">No</th>
                                <th>Judul Artikel</th>
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                           @php $no = 1; @endphp
                            @foreach ($artikel as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$data->judul}}</td>
                                                             
                                <td><img src="{{asset('assets/img/artikel/' .$data->foto. '')}}"
                                    style="width:240px; height:140px;" alt="Foto"></td>

								<td style="text-align: center;">
                                    <form action="{{route('artikel.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('artikel.edit', $data->id)}}"
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