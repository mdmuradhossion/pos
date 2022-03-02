@extends('layouts.admin_app')
@section('content')

		<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Customer Update</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/customer')}}">Customer List</a></li>
                    </ol>
                </div>
            </div>

			<div class="container-fluid">
			    <div class="row">
					<div class="col-md-12">
			            <div class="card">
			                <div class="card-body">
			                    <h4 class="card-title">Customer Update</h4>
			                    <ul class="nav nav-pills mb-3">
			                        <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Register Info</a>
			                        </li>
			                        <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Image</a>
			                        </li>
			                    </ul>
			                    @foreach($customers as $view)
			                    <div class="tab-content br-n pn">
			                        <div id="navpills-1" class="tab-pane active">
			                            <div class="row align-items-center">
			                                <div class="col-12">
			                                    <form class="form-valide" action="{{ url('/customer_update',$view->cus_id)}}" method="post">
			                                    	@csrf
			                                        <div class="form-group row">
			                                            <label class="col-lg-4 col-form-label" for="name">Username <span class="text-danger">*</span>
			                                            </label>
			                                            <div class="col-lg-6">
			                                                <input type="text" class="form-control" id="name" name="name" value="{{$view->name}}">
			                                            </div>
			                                        </div>                                        
			                                        
			                                        <div class="form-group row">
			                                            <label class="col-lg-4 col-form-label" for="phone">Phone (Bd) <span class="text-danger">*</span>
			                                            </label>
			                                            <div class="col-lg-6">
			                                                <input type="text" class="form-control" id="phone" name="phone" value="{{$view->phone}}">
			                                            </div>
			                                        </div>
			                                        <div class="form-group row">
			                                            <label class="col-lg-4 col-form-label" for="address">Address <span class="text-danger">*</span>
			                                            </label>
			                                            <div class="col-lg-6">
			                                                <input type="text" class="form-control" id="address" name="address" value="{{$view->address}}">
			                                            </div>
			                                        </div>
			                                        <div class="form-group row">
			                                            <label class="col-lg-4 col-form-label" for="status">Status <span class="text-danger">*</span>
			                                            </label>
			                                            <div class="col-lg-6">
			                                                <select class="form-control" id="status" name="status">
			                                                   
			                                                <?php echo Helpers::globalStatus($view->status) ?>
			                                                </select>      
			                                            </div>
			                                        </div>
			                                        
			                                        <div class="form-group row">
			                                            <div class="col-lg-8 ml-auto">
			                                            	<input type="hidden" name="cus_id" value="{{$view->cus_id}}">
			                                                <button type="submit" class="btn btn-primary">Update</button>
			                                                <a href="{{url('/customer')}}" class="btn btn-warning">Cancel</a>
			                                            </div>
			                                        </div>
			                                    </form>
			                                </div>			                                
			                            </div>
			                        </div>
			                        <div id="navpills-2" class="tab-pane">
			                            <div class="row align-items-center">
			                                <div class="col-12">
			                                	<form class="form-valide" action="{{ url('/customer_update_image',$view->cus_id) }}" method="post" enctype="multipart/form-data" >
			                                    	{{csrf_field() }}
				                                	<div class="form-group row">
			                                            <label class="col-lg-4 col-form-label" for="name">Username <span class="text-danger">*</span>
			                                            </label>
			                                            <div class="col-lg-6">
			                                                <div class="input-group mb-3">
					                                            <div class="input-group-prepend"><span class="input-group-text">Upload</span>
					                                            </div>
					                                            <div class="custom-file">
					                                                <input type="file" class="custom-file-input" name="image" value="{{csrf_token()}}" required>
					                                                <label class="custom-file-label">Choose file</label>
					                                            </div>
					                                        </div>
			                                            </div>
			                                        </div>

			                                        <div class="form-group row">
			                                            <div class="col-lg-8 ml-auto">
			                                            	<input type="hidden" name="cus_id" value="{{$view->cus_id}}">
			                                                <button type="submit" class="btn btn-primary">Update</button>
			                                                <a href="{{url('/customer')}}" class="btn btn-warning">Cancel</a>
			                                            </div>
			                                        </div>
			                                    </form>
			                                    
			                                </div>
			                                
			                            </div>
			                        </div>
			                    </div>
			                    @endforeach
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
@endsection