@extends('backend.srtdash')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Kategori</h5><br>
                <center>
                        <a href="{{ route('kategori.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $data)
                            <tr>
                                <td>{{$data->nama_kategori}}</td>
                                <td>{{$data->slug}}</td>
								<td style="text-align: center;">
                                    <form action="{{route('kategori.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="{{route('kategori.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> Edit
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{route('kategori.show', $data->id)}}"
										class="zmdi zmdi-eye btn btn-primary btn-rounded btn-floating btn-outline"> Show
                                    </a >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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