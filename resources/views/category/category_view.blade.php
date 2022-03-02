@extends('layouts.admin_app')

@section('content')
		<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Category View</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/category')}}">Category List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                            	<h4 class="card-title">Category View</h4>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <tbody>
                                        	@foreach($category as $view)
                                            <tr class="table-active">
                                            	<td>Category Name</td>
                                                <td>{{$view->category_name}}</td>
                                            </tr>
                                            <tr class="table-primary">
                                            	<td>Parent Category</td>
                                                <td><?php echo Helpers::get_data_by_id('category_name','product_category','prod_cat_id',$view->parent_pro_cat);?></td>
                                            </tr>
                                            
                                            <tr class="table-active">
                                            	<td colspan="2"><a href="{{url('/category')}}" class="btn mb-1 btn-rounded btn-outline-secondary btn-sm" id="delete" style="float:right;">Cancel</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
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