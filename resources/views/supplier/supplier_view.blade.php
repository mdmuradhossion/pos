@extends('layouts.admin_app')

@section('content')
		<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Suppliers View</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/supplier')}}">Suppliers List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                            	<h4 class="card-title">Suppliers View</h4>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <tbody>
                                        	@foreach($suppliers as $view)
                                            <tr class="table-active">
                                            	<td>Name</td>
                                                <td>{{$view->name}}</td>
                                            </tr>
                                            <tr class="table-primary">
                                            	<td>Phone</td>
                                                <td>{{$view->phone}}</td>
                                            </tr>
                                            <tr class="table-success">
                                            	<td>Balance</td>
                                                <td>{{$view->balance}}</td>
                                            </tr>
                                            <tr class="table-info">
                                            	<td>Address</td>
                                                <td>{{$view->address}}</td>
                                            </tr>
                                            <tr class="table-warning">
                                            	<td>Status</td>
                                                <td><?php print Helpers::statusView($view->status)?></td>
                                            </tr>
                                            <tr class="table-active">
                                            	<td colspan="2"><a href="{{url('/supplier')}}" class="btn mb-1 btn-rounded btn-outline-secondary btn-sm" id="delete" style="float:right;">Cancel</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                            	<h4 class="card-title">Image</h4>
                            	@foreach($suppliers as $view)
                                <?php if($view->image != NULL){
                                echo '<img src="/Uplodes/supplier/'.$view->image.'" width="80%" class="img-radius">';
                                }else{ 
                                echo '<img src="/Uplodes/supplier/noimage.jpg" width="100%" class="img-radius">';
                                 } ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

@endsection