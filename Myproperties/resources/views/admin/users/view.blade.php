@extends('layouts.admin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header" style="margin-top: 50px;">
		<h1>Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> Users</a></li>
			<li class="active">View Users</li>
		</ol>
		<br>
		 @include('partials.admin_alerts')
	</section>


	<!-- Main content -->
	<section class="content">
	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8">
				<form id="delForm" method="POST" action="{{route('admin.users.delete')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="">
                </form>

				<form class="form-horizontal">
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Name</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName" placeholder="Name" disabled value="{{$users->name}}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>

						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail" placeholder="Email" disabled value="{{$users->email}}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPhone" class="col-sm-2 control-label">Phone</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputPhone" placeholder="Phone" disabled value="{{$users->phone}}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAdmin" class="col-sm-2 control-label">Super Admin</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputAdmin" placeholder="Admin User" disabled value="@if($users->super_admin) TRUE @else FALSE @endif">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" data-id="{{$users->id}}" class="btn btn-danger del">Delete</button>
						</div>
					</div>
				</form>
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

	    $(document).on('click', '.del', function(event) {
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
	</script>
@endsection