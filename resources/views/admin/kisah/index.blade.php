@extends('backend.srtdash')


@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Kisah</h5><br>
                <center>
                        <a href="{{ route('kisah.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                <table class=”zebra-table“>
                    <table id="datatable" class="table ">
                    <thead class="thead-dark">
                            <tr>
                                <th>Kisah</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kisah as $data)
                            <tr>
                                <td>{{$data->nama_kisah}}</td>
                                <td>{{$data->slug}}</td>
								<td style="text-align: center;">
                                    <form action="{{route('kisah.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
                                     
									<a href="{{route('kisah.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> <i class="	fa fa-pen"></i>
                                    </a>   
                                    <a href="{{route('kisah.show', $data->id)}}"
										class="zmdi zmdi-eye btn btn-primary btn-rounded btn-floating btn-outline"> <i class="	fa fa-eye"></i> 
                                    </a >
                                    <form action="{{ route('kisah.destroy', $data->id) }}" method="post">
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