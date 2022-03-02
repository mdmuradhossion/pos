@extends('layouts.admin_app')

@section('content')
		<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Holder Add</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/accountholder')}}">Account Holder List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            	<!-- <a href="{{ url('/customerForm') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Customer</a>-->
                                <h4 class="card-title">Account Holder Create Form</h4> 
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                

                                <div class="form-validation">
                                    <form class="form-valide" action="{{ url('/accountholderstore') }}" method="post">
                                    	@csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="name">Username <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter a username.." value="{{ old('name') }}">
                                            </div>
                                        </div>                                        
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="phone">Phone (Bd) <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+880 00000000" value="{{ old('phone') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="address">Address <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Status <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="status" name="status">
                                                    <?php echo Helpers::globalStatus($status) ?>
                                                </select>      
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

@endsection