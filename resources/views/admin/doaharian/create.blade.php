@extends('argon')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/js/components/select2-init.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        $(document).ready(function () {
        $('#select2').select2();
    })
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Membuat Data doaharian</div>
                <div class="card-body">
                <form action="{{ route('doaharian.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Arab</label>
                    <input type="text" name="arab" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Latin</label>
                    <input type="text" name="latin" id="" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="">Artinya</label>
                    <input type="text" name="arti" id="" class="form-control" required>
                </div>
                  <div class="form-group">
                    <label for="">Nama doa</label>
                    <select name="doa_id" class="form-control" required>
                        @foreach($doa as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_doa }}</option>
                        @endforeach
                      </select>
                    </div>
                <br>
                <button type="submit" name="Simpan"class="btn btn-md btn-info">Simpan</button>
                </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection