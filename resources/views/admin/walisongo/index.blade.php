@extends('backend.srtdash')


@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Profil Murid</h5><br>
                <center>
                        <a href="{{ route('walisongo.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Walisongo</th>
                                <th>Foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach ($walisongo as $data)
                            <tr>
                            <td>{{$no++}}</td>
                                <td>{{$data->nama_walisongo}}</td>
                                <td><img src="{{asset('assets/img/walisongo/' .$data->foto. '')}}"
                                style="width:270px; height:190px;" alt="Foto"></td>

								<td style="text-align: center;">
                                    <form action="{{route('walisongo.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('walisongo.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> Edit
                                    </a>
                                    
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="zmdi zmdi-delete  btn-rounded btn-floating btn btn-dangerbtn btn-danger btn-outline"> Delete</button>
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