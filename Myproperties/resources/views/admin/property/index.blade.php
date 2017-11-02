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
		<h1>Property
			<small>All Properties</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Properties</li>
		</ol>
    <br>
    @include('partials.admin_alerts')
	</section>


<!-- Main content -->
  <section class="content">
  	<!-- Small boxes (Stat box) -->
  	<div class="row">
  		<div class="col-sm-12">
  			<div class="box">
              <div class="box-header">
                <h3 class="box-title">Manage Properties</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form id="delForm" method="POST" action="{{route('admin.property.delete')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="">
                </form>

                  <table id="properties-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>For Sale(s)</th>
                        <th>For Rent</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($properties as $property)
                        <tr>
                          <td>{{$property->title}}</td>
                          <td>{{$property->decsription}}</td>
                          <td>{{$property->city}}, {{$property->country}}</td>
                          <td>@if($property->sale) TRUE @else FALSE @endif</td>
                          <td>@if($property->rent) TRUE @else FALSE @endif</td>
                          <td><a href="{{route('admin.property.edit', ['id' => $property->id])}}" class="btn btn-xs btn-info">Edit</a></td>
                          <td><a href="#" data-id="{{$property->id}}" class="btn btn-xs btn-danger fa fa-trash del"></a></td>
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
    $('#user-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $(document).on('click', '#properties-table td .del', function(event) {
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