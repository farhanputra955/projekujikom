@extends('backend.srtdash')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Kerajaan</h5><br>
                <center>
                        <a href="{{ route('kerajaan.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama kerajaan</th>
                                <th>Foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kerajaan as $data)
                            <tr>
                                <td>{{$data->nama_kerajaan}}</td>
                                <td><img src="{{asset('assets/img/kerajaan/' .$data->foto. '')}}"
                                style="width:270px; height:190px;" alt="Foto"></td>

								<td style="text-align: center;">
                                    <form action="{{route('kerajaan.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('kerajaan.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> Edit
                                    </a>
                                    <a href="{{route('kerajaan.show', $data->id)}}"
										class="zmdi zmdi-eye btn btn-success btn-rounded btn-floating btn-outline"> Show
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