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
			<li class="active">My Profile</li>
		</ol>
		<br>
		 @include('partials.admin_alerts')
	</section>


	<!-- Main content -->
	<section class="content">
	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8">

				<form class="form-horizontal" method="post" action="{{ route('admin.profile.index') }}">
					{{csrf_field()}}
					<div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Name</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" placeholder="Name" required value="{{$user->name}}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-sm-2 control-label">Email</label>

						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" placeholder="Email" required value="{{$user->email}}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPhone" class="col-sm-2 control-label">Phone</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" name="phone" placeholder="Phone" required value="{{$user->phone}}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAdmin" class="col-sm-2 control-label">Super Admin</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" name="super_admin" placeholder="Admin User" disabled value="@if($user->super_admin) TRUE @else FALSE @endif">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Update</button>
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

@endsection