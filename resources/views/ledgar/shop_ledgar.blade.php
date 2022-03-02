@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/shop_ledgar')}}">Shop Ledgar</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    	<!-- <a href="{{ url('/category_form') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Category</a> -->
                        <h4 class="card-title">Shop Ledgar</h4>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                    	<th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
                                    </tr>
                                </thead>
                                <tbody>@foreach($ledgar as $view)
                                    <tr>
                                    	<td>{{$view->created_at}}</td>
                                        <td>{{$view->particulars}}</td>
                                        <td>{{$view->trans_id}}</td>
                                        <td>{{$view->transaction_type}}</td>
                                        <td>{{$view->amount}}</td>
                                        <td>{{$view->rest_balance}}</td>
                                    </tr>
                                           
                                </tbody>@endforeach
                                <tfoot>
                                    <tr>
                                    	<th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
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