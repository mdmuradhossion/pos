@extends('layouts.admin_app')
@section('content')

		<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Brand Update</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/brand')}}">Brand List</a></li>
                    </ol>
                </div>
            </div>

			<div class="container-fluid">
			    <div class="row">
					<div class="col-md-12">
			            <div class="card">
			                <div class="card-body">
			                    <h4 class="card-title">Brand Update</h4>
			                    @if ($errors->any())
		                            <div class="alert alert-danger">
		                                <ul>
		                                    @foreach ($errors->all() as $error)
		                                        <li>{{ $error }}</li>
		                                    @endforeach
		                                </ul>
		                            </div>
		                        @endif 
			                    <ul class="nav nav-pills mb-3">
			                        <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Register Info</a>
			                        </li>
			                        <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Image</a>
			                        </li>
			                    </ul>
			                    @foreach($brand as $view)
			                    <div class="tab-content br-n pn">
			                        <div id="navpills-1" class="tab-pane active">
			                            <div class="row align-items-center">
			                                <div class="col-12">
			                                    <form class="form-valide" action="{{ url('/brand_update',$view->brand_id)}}" method="post">
			                                    	@csrf
			                                        <div class="form-group row">
			                                            <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span>
			                                            </label>
			                                            <div class="col-lg-6">
			                                                <input type="text" class="form-control" id="name" name="name" value="{{$view->name}}">
			                                            </div>
			                                        </div>
			                                        
			                                        <div class="form-group row">
			                                            <div class="col-lg-8 ml-auto">
			                                                <button type="submit" class="btn btn-primary">Update</button>
			                                                <a href="{{url('/brand')}}" class="btn btn-warning">Cancel</a>
			                                            </div>
			                                        </div>
			                                    </form>
			                                </div>			                                
			                            </div>
			                        </div>
			                        <div id="navpills-2" class="tab-pane">
			                            <div class="row align-items-center">
			                                <div class="col-12">
			                                	<form class="form-valide" action="{{ url('/brand_update_image',$view->brand_id) }}" method="post" enctype="multipart/form-data" >
			                                    	{{csrf_field() }}
				                                	<div class="form-group row">
			                                            <label class="col-lg-4 col-form-label" for="name">Image <span class="text-danger">*</span>
			                                            </label>
			                                            <div class="col-lg-6">
			                                            	<input type="file" class="form-control-file" name="image" value="{{csrf_token()}}">
			                                            </div>
			                                        </div>

			                                        <div class="form-group row">
			                                            <div class="col-lg-8 ml-auto">
			                                                <button type="submit" class="btn btn-primary">Update</button>
			                                                <a href="{{url('/brand')}}" class="btn btn-warning">Cancel</a>
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