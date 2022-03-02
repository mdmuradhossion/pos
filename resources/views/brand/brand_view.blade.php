@extends('layouts.admin_app')

@section('content')
		<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Brand View</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/brand')}}">Brand List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                            	<h4 class="card-title">Brand View</h4>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <tbody>
                                        	@foreach($brand as $view)
                                            <tr class="table-active">
                                            	<td>Brand Name</td>
                                                <td>{{$view->name}}</td>
                                            </tr>
                                            
                                            <tr class="table-active">
                                            	<td colspan="2"><a href="{{url('/brand')}}" class="btn mb-1 btn-rounded btn-outline-secondary btn-sm" id="delete" style="float:right;">Cancel</a></td>
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
                            	@foreach($brand as $view)
                                <?php if($view->image != NULL){
                                echo '<img src="/Uplodes/brand/'.$view->image.'" width="80%" class="img-radius">';
                                }else{ 
                                echo '<img src="/Uplodes/brand/noimage.jpg" width="100%" class="img-radius">';
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