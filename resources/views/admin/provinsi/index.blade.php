@extends('backend.srtdash')


@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Provinsi</h5><br>
                <center>
                        <a href="{{ route('provinsi.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                <table class=”zebra-table“>
                    <table id="datatable" class="table ">
                    <thead class="thead-dark">
                            <tr>
                                <th>Provinsi</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provinsi as $data)
                            <tr>
                                <td>{{$data->nama_provinsi}}</td>
                                <td>{{$data->slug}}</td>
								<td style="text-align: center;">
                                    <form action="{{route('provinsi.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
                                     
									<a href="{{route('provinsi.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> <i class="	fa fa-pen"></i>
                                    </a>   
                                    
                                    <form action="{{ route('provinsi.destroy', $data->id) }}" method="post">
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