@extends('layouts.admin')

@section('page:styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/admin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header" style="margin-top: 50px;">
		<h1>Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Users</li>
		</ol>
    <br>
    @include('partials.admin_alerts')
	</section>


<!-- Main content -->
  <section class="content">
  	<!-- Small boxes (Stat box) -->
  	<div class="row">
  		<div class="col-sm-offset-2 col-sm-8">
  			<div class="box">
              <div class="box-header">
                <h3 class="box-title">Manage Admin Users</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form id="delForm" method="POST" action="{{route('admin.users.delete')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="">
                </form>

                  <table id="users-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone(s)</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->phone}}</td>
                          <td><a href="{{route('admin.users.view', ['id' => $user->id])}}" class="btn btn-xs btn-info">View</a></td>
                          <td><a href="#" data-id="{{$user->id}}" class="btn btn-xs btn-danger fa fa-trash del"></a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
              <!-- /.box-body -->
            </div>

  		</div>
  	</div>
</section>
</div>


@endsection

@section('page:scripts')

<!-- DataTables -->
<script src="{{ asset('assets/admin/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Sweetalert.js -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {
    $('#user-search').DataTable()
    $('#users-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $(document).on('click', '#users-table td .del', function(event) {
      event.preventDefault();

      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

          $("input[name = 'id']").val($(this).attr('data-id'));
          document.getElementById('delForm').submit();

          swal("Poof! User info has been deleted!", {
            icon: "success", 
          });
        } else {
          swal("You Cancelled Delete!"); 
        }
      });
    });
  });
</script>
 @endsection