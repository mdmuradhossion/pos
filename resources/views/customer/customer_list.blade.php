@extends('layouts.admin_app')

@section('content')
		<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Customer List</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            	<a href="{{ url('/customerForm') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Customer</a>
                                <h4 class="card-title">Customer List</h4>

                                <center><b style="font-size: 18px; color: green;"><?php $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message',null);
                                } ?></b></center>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Balance</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customers as $view)
                                            <tr>
                                                <td>{{$view->name}}</td>
                                                <td>{{$view->phone}}</td>
                                                <td>{{$view->balance}}</td>
                                                <td>{{$view->address}}</td>
                                                <td><?php print Helpers::statusView($view->status)?></td>
                                                <td>
                                                    <a href="{{URL::to('/customer_view',$view->cus_id)}}" class="btn mb-1 btn-rounded btn-outline-info btn-sm">View</a>
                                                    <a href="{{URL::to('/customer_edit',$view->cus_id)}}" class="btn mb-1 btn-rounded btn-outline-warning btn-sm">Edit</a>
                                                    <a href="{{URL::to('/customer_delete',$view->cus_id)}}" class="btn mb-1 btn-rounded btn-outline-danger btn-sm" id="delete">Delete</a>

                                                </td>
                                            </tr>
                                                   
                                        </tbody>@endforeach
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Balance</th>
                                                <th>Address</th>
                                                <th>Status</th>
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