@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/products')}}">Products List</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    	<!-- <a href="{{ url('/customerForm') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Products</a> -->
                        <h4 class="card-title">Products List</h4>

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
                                        <th>Quantity</th>
                                        <th>Purchase Price</th>                   
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $view)
                                    <tr>
                                        <td>{{$view->name}}</td>
                                        <td>{{$view->quantity}}</td>
                                        <td>{{$view->purchase_price}}</td>          
                                        <td><?php print Helpers::get_data_by_id('category_name','product_category','prod_cat_id',$view->prod_cat_id)?></td>
                                        <td>
                                        	<?php if($view->image != NULL){
			                                echo '<img src="/Uplodes/product/'.$view->image.'" width="80%" class="img-radius">';
			                                }else{ 
			                                echo '<img src="/Uplodes/product/noimage.jpg" width="100%" class="img-radius">';
			                                 } ?>                            	
			                             </td>
                                        <td>
                                            <a href="{{URL::to('/customer_view',$view->prod_id)}}" class="btn mb-1 btn-rounded btn-outline-info btn-sm">View</a>
                                            <a href="{{URL::to('/customer_edit',$view->prod_id)}}" class="btn mb-1 btn-rounded btn-outline-warning btn-sm">Edit</a>
                                            <a href="{{URL::to('/customer_delete',$view->prod_id)}}" class="btn mb-1 btn-rounded btn-outline-danger btn-sm" id="delete">Delete</a>

                                        </td>
                                    </tr>
                                           
                                </tbody>@endforeach
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Purchase Price</th>                   
                                        <th>Category</th>
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