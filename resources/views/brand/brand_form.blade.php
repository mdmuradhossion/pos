@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/brand_form')}}">Brand Create</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/brand')}}">Brand List</a></li>
            </ol>
        </div>
    </div>
     <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Brand Create</h4>
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
                            <form class="form-valide" action="{{ url('/brandstore') }}" method="post" enctype="multipart/form-data">
                            	{{csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter a name.." >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="address">Image <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">                
                                        <input type="file" class="form-control-file" name="image" value="{{csrf_token()}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Create</button>
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