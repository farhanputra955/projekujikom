@extends('argon')

<meta name = "csrf-token" content = "{!! csrf_token () !!}"> 
@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">   
                <div class="container">
    <h1>Laravel 6 Crud with Ajax</h1>
    <center><a class="btn btn-success" href="javascript:void(0)" id="createNewcategory"> Create New category</a></center>
    
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-nama" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
            <form id="form" name="form" class="form-horizontal">
                    <input type="hidden" name="kategori_id" id="kategori_id">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label for="name" class="control-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kategori" maxlength="50" autocomplete="off" required>
                            <span style="color: red;" id="error_nama"></span>
                            <br>
                            <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
   <script src="/assets/package/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
   
<script>
$('#modal').on('hidden.bs.modal',function(){
    $('#error_nama').css('display','none');
})
</script>
<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('category.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'slug', name: 'slug'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewcategory').click(function () {
        $('#saveBtn').val("create-category");
        $('#category_id').val('');
        $('#Form').trigger("reset");
        $('#modelHeading').html("Create New category");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editcategory', function () {
      var category_id = $(this).data('id');
      $.get("{{ route('category.index') }}" +'/' + category_id +'/edit', function (data) {
          $('#modelHeading').html("Edit category");
          $('#saveBtn').val("edit-category");
          $('#ajaxModel').modal('show');
          $('#category_id').val(data.id);
          $('#nama').val(data.nama);
          $('#nama').keypress(function(){
                $('#error_nama').css('display','none');
            });
        });
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        $.ajax({
          data: $('#Form').serialize(),
          url: "{{ route('category.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#Form').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
              Swal.fire({
                icon: 'success',
                nama: 'Berhasil Tambah Data!',
                showConfirmButton: false,
                timer: 1500
                })
          },
          error: function (request, status, error) {
                $('#error_nama').empty().show();
                json = $.parseJSON(request.responseText);
                $('#error_nama').html(json.errors.nama);
            }
      });
    });
    
    $('body').on('click', '.deletecategory', function () {

        var category_id = $(this).data("id");
        Swal.fire({
            nama: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
            type: "DELETE",
            url: "{{ route('category.store') }}"+'/'+category_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
    });
     
  });
</script>
</body>
</html>
</div>
        </div>
    </div>
</section>
@endsection
