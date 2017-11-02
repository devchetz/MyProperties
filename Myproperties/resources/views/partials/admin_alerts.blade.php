@if(session('error'))
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	{{session('error')}}
</div>
@endif

@if(session('status') || session('success'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-check"> Alert!</i></h4>
	{{session('status')}} {{session('success')}}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"> Alert!</i></h4>
	<ul>
		@foreach($errors->all() as $error)
			<li style="color:darkred;">{{$error}}</li>
		@endforeach
	</ul>
</div>

@endif
