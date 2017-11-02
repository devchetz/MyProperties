@extends('layouts.admin')
@section('page:styles')
	<!-- iCheck -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/plugins/iCheck/square/blue.css') }} ">
@endsection
@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Property<small>Add Property</small></h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#"><i class="fa fa-dashboard"></i> My Prperties</a></li>
			<li class="active">Add Property</li>
		</ol>
	<br>
	@include('partials.admin_alerts')
    </section>

    <form method="POST" action="{{route('admin.property.add')}}">
    	{{csrf_field()}}
    
    	<!-- Main content -->
	    <section class="content">
			<div class="row">
		    <!-- left column -->
			    <div class="col-md-6">
			      	<!-- general form elements -->
					<div class="box box-primary">
			            <div class="box-header with-border">
			              <h3 class="box-title">Basic Information</h3>
			            </div>
			            <!-- /.box-header -->
		            	<!-- form start -->
			            <form role="form">
							<div class="box-body">
								<div class="form-group">
									<label for="title">Title</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Property Title" required value="{{old('title')}}">
								</div>

								<div class="form-group">
									<label for="description">Description</label>
									<textarea max="300" style="resize: resize-y;" rows="5" class="form-control" id="description" name="description" placeholder="Property Description" required>{{old('description')}}</textarea>
								</div>

				                <div class="form-group">
				                	<label for="type_id">Property Type</label>
				                	<select class="form-control" name="type_id">
				                		<option selected disabled>Select Propaerty Type</option>
				                		@foreach($property_types as $type)
				                		<option @if(old('type_id') == $type->id) selected @endif value="{{$type->id}}">{{$type->type}}</option>
				                		@endforeach
				                	</select>
				                </div>

				                <div class="form-group">
				                	<label for="state_id">Property State</label>
				                	<select class="form-control" name="state_id">
				                		<option selected disabled>Select Propaerty State</option>
				                		@foreach($property_states as $state)
				                		<option @if(old('state_id') == $state->id) selected @endif value="{{$state->id}}">{{$state->state}}</option>
				                		@endforeach
				                	</select>
				                </div>

				                <hr>
				                <div class="rows">
				                	<div class="col-sm-4">
				                		<div class="form-group">
				                			<label for="bedroom_count">Bedroom</label>
				                			<input type="number" min="0" class="form-control" id="bedroom_count" name="bedroom_count" value="{{old('bedroom_count', '0')}}" required>
				                		</div>
				                	</div>
				                </div>
				                <div class="rows">
				                	<div class="col-sm-4">
				                		<div class="form-group">
				                			<label for="bathroom_count">Bathroom</label>
				                			<input type="number" min="0" class="form-control" id="bathroom_count" name="bathroom_count" value="{{old('bathroom_count', '0')}}" required>
				                		</div>
				                	</div>
				                </div>
				                <div class="rows">
				                	<div class="col-sm-4">
				                		<div class="form-group">
				                			<label for="garage_count">Garage</label>
				                			<input type="number" min="0" class="form-control" id="garage_count" name="garage_count" value="{{old('garage_count', '0')}}" required>
				                		</div>
				                	</div>
				                </div>
					            
				                <br>
				                <div class="rows">
				                	<div class="col-sm-4">
				                		<div class="form-group">
				                			<label for="plot_area">Plot Area</label>
				                			<input type="number" min="0" class="form-control" id="plot_area" name="plot_area" value="{{old('plot_area', '0')}}" required>
				                		</div>
				                	</div>
				                </div>
				                <div class="col-sm-4">
				                	<div class="form-group">
				                		<label for="construction_area">Construction Area</label>
				                		<input type="number" min="0" class="form-control" id="construction_area" name="construction_area" value="{{old('construction_area', '0')}}" required>
				                	</div>
				                </div>
				                <div class="col-sm-4">
				                	<div class="form-group">
				                		<label for="area_unit">Area Unit</label>
				                		<select class="form-control" name="area_unit">
				                			<option selected>meter-square</option>
				                			<option>feet-square</option>
				                		</select>
				                	</div>
				                </div>
				            </div>
				        </form>
					            

			                <!-- <div class="form-group">
			                  <label for="exampleInputFile">Upload Pictures</label>
			                  <input type="file" id="exampleInputFile">
			                </div>

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div> -->

			        </div>
			        <!-- /.box -->
				</div>
		        <!--/.col (left) -->

		        <!-- right column -->
		        <div class="col-md-6">
		          <!-- Horizontal Form -->
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">3. Property Location</h3>
						</div>

						<div class="box-body">
							<div class="form-group">
								<label for="street_address">Steet Address</label>
								<textarea max="300" rows="5" class="form-control" id="street_address" name="street_address" placeholder="" required>{{old('street_address')}}</textarea>
							</div>
							<div class="form-group">
								<label for="street_number">Street Number</label>
								<input type="number" class="form-control" id="street_number" name="street_number" value="{{old('street_number', '0')}}" required>
							</div>
							<div class="row">
			                	<div class="col-sm-6">
			                		<div class="form-group">
			                			<label for="city">City</label>
			                			<input type="text" class="form-control" id="city" name="city" required value="{{old('city', '0')}}">
			                		</div>
			                	</div>

			                	<div class="col-sm-6">
			                		<div class="form-group">
			                			<label for="region">Region</label>
			                			<input type="text" class="form-control" id="region" name="region" value="{{old('region', '0')}}" required>
			                		</div>
			                	</div>

			                	<div class="col-sm-6">
			                		<div class="form-group">
			                			<label for="postal_code">Postal Code</label>
			                			<input type="text" class="form-control" id="postal_code" name="postal_code" value="{{old('postal_code', '0')}}" required>
			                		</div>
			                	</div>

			                	<div class="col-sm-6">
			                		<div class="form-group">
			                			<label for="country">Country</label>
			                			<input type="text" class="form-control" id="country" name="country" value="{{old('country', '0')}}" required>
			                		</div>
			                	</div>
			                </div>
			            </div>
			        </div>

			        <!-- Pricing info Box -->
			        <div class="box box-info" id="pricing-info-box">
			        	<div class="box-header with-border">
			        		<h3 class="box-title">2. Pricing Info</h3>
			        	</div>
			        	<div class="box-body">
			        		<div class="row">
			        			<div class="col-sm-3">
			        				<div class="checkbox icheck">
			        					<label>
			        						<input type="checkbox" name="sale" value="{{old('sale')}}"> For Sale
			        					</label>
			        				</div>
			        			</div>
			        			<div class="col-sm-3">
			        				<div class="checkbox icheck">
			        					<label>
			        						<input type="checkbox" name="rental" value="{{old('rental')}}"> For Rent
			        					</label>
			        				</div>
			        			</div>
			        			<div class="col-sm-3">
			        				<div class="checkbox icheck">
			        					<label>
			        						<input type="checkbox" name="is_featured" value="{{old('is_featured', '0')}}"> Featured
			        					</label>
			        				</div>
			        			</div>
			        			<div class="col-sm-3">
			        				<div class="checkbox icheck">
			        					<label>
			        						<input type="checkbox" name="is_public" value="{{old('is_public', '0')}}"> Show on Site
			        					</label>
			        				</div>
			        			</div>
			        		</div>
			        		<br>
			        		<div id="selling_price">
			        			<div class="form-group">
			        				<label for="current_selling_price">Current Selling Price</label>
			        				<input type="number" min="0" class="form-control" id="current_selling_price" name="current_selling_price" value="{{old('current_selling_price', '0')}}">
			        			</div>
			        			<div class="form-group">
			        				<label for="original_selling_price">Original Selling Price</label>
			        				<input type="number" min="0" class="form-control" id="original_selling_price" name="original_selling_price" value="{{old('original_selling_price', '0')}}">
			        			</div>
			        			<div class="form-group">
			        				<label for="current_rental_price">Current Rental Price</label>
			        				<input type="number" min="0" class="form-control" id="current_rental_price" name="current_rental_price" value="{{old('current_rental_price', '0')}}">
			        			</div>
			        			<div class="form-group">
			        				<label for="current_rental_price">Original Rental Price</label>
			        				<input type="number" min="0" class="form-control" id="current_rental_price" name="current_rental_price" value="{{old('current_rental_price', '0')}}">
			        			</div>
			        		</div>
			        		<div class="form-group">
			        			<label for="currency_id">Currency</label>
			        			<select class="form-control" name="currency_id" required>
			                		<option selected disabled>Select Propaerty Currency</option>
			                		@foreach($currency as $currency)
			                			<option @if(old('currency_id') == $currency->id) selected @endif value="{{$currency->id}}">{{$currency->name}} ({!! $currency->symbol !!})</option>
			                		@endforeach
			        			</select>
			        		</div>
		        		</div>
		        	</div>
		        </div>

			        <!-- /.box-body -->

				<div class="rows">
					<div class="col-sm-offset-3 col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Finalize</h3>
							</div>
							<div class="box-footer text-container">
								<button type="submit" class="btn btn-info btn-lg">Create new property</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-footer -->
			</div>
		</section>
	</form>
</div>

@endsection

@section('page:scripts')
<script src="{{ asset('assets/admin/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection