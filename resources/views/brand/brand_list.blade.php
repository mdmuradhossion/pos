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
                    	<a href="{{ url('/brand_form') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Brand</a>
                        <h4 class="card-title">Brand List</h4>

                        <center><b style="font-size: 18px; color: green;"><?php $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message',null);
                        } ?></b></center>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Brand Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brand as $view)
                                    <tr>
                                        <td>{{$view->name}}</td>
                                        <td><img class="rounded-circle" src="/Uplodes/brand/<?php print ($view->image == NULL)? 'noimage.jpg' : $view->image ;?>" alt="" width="80"></td>
                                        <td>
                                            <a href="{{URL::to('/brand_view',$view->brand_id)}}" class="btn mb-1 btn-rounded btn-outline-info btn-sm">View</a>
                                            <a href="{{URL::to('/brand_edit',$view->brand_id)}}" class="btn mb-1 btn-rounded btn-outline-warning btn-sm">Edit</a>
                                            <a href="{{URL::to('/brand_delete',$view->brand_id)}}" class="btn mb-1 btn-rounded btn-outline-danger btn-sm" id="delete">Delete</a>

                                        </td>
                                    </tr>
                                           
                                </tbody>@endforeach
                                <tfoot>
                                    <tr>
                                        <th>Brand Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->



</div>
@endsection