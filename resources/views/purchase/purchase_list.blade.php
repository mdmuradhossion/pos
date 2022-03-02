@extends('layouts.admin_app')

@section('content')
		<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase List</a></li>
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
                            	<a href="{{ url('/purchase_form') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Purchase</a>
                                <h4 class="card-title">Purchase List</h4>

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
                                                <th>Amount</th>
                                                <th>Cash</th>
                                                <th>Due</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>@foreach($purchase as $view)
                                            <tr>
                                                <td><?php echo Helpers::get_data_by_id('name','suppliers','supp_id',$view->supp_id) ?></td>
                                                <td>{{$view->amount}}</td>
                                                <td>{{$view->cash}}</td>
                                                <td>{{$view->due}}</td>
                                                <td>
                                                    <a href="{{URL::to('/view',$view->purch_id)}}" class="btn mb-1 btn-rounded btn-outline-info btn-sm">View</a>
                                                </td>
                                            </tr>
                                                   
                                        </tbody>@endforeach
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Cash</th>
                                                <th>Due</th>
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