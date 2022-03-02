@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/category_form')}}">Category Create</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/category')}}">Category List</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    	<a href="{{ url('/category_form') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Category</a>
                        <h4 class="card-title">Category List</h4>

                        <center><b style="font-size: 18px; color: green;"><?php $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message',null);
                        } ?></b></center>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>@foreach($category as $view)
                                    <tr>
                                    	<td><?php $i= '*'; echo $i++?></td>
                                        <td>{{$view->category_name}}</td>
                                        <td>
                                            <a href="{{URL::to('/category_view',$view->prod_cat_id)}}" class="btn mb-1 btn-rounded btn-outline-info btn-sm">View</a>
                                            <a href="{{URL::to('/category_edit',$view->prod_cat_id)}}" class="btn mb-1 btn-rounded btn-outline-warning btn-sm">Edit</a>
                                            <a href="{{URL::to('/category_delete',$view->prod_cat_id)}}" class="btn mb-1 btn-rounded btn-outline-danger btn-sm" id="delete">Delete</a>

                                        </td>
                                    </tr>
                                           
                                </tbody>@endforeach
                                <tfoot>
                                    <tr>
                                    	<th>No</th>
                                        <th>Category Name</th>
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