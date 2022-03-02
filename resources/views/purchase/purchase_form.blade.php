@extends('layouts.admin_app')

@section('content')
		<div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Add</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/purchase')}}">Purchase List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            	<h4 class="card-title">Product Purchase</h4>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <center><b style="font-size: 18px; color: green;"><?php $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message',null);
                                } ?></b></center>
                                <form method="POST" action="{{ url('/addTocart') }}">
                                    @csrf 
                                    <div class="row">
                                        <div class="col-md-6 col-lg-2">       
                                            <label class="col-form-label" for="name">Name<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control"  id="name" name="name" placeholder="Product Name" value="{{ old('name') }}">
                                                
                                        </div>

                                        <div class="col-md-6 col-lg-2">       
                                            <label class="col-form-label" for="name">Category<span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control cat_id" id="cat_id" name="cat_id" >
                                                <option value="0">Please Select</option>
                                                <?php echo Helpers::subCategoryListOption(0) ?>
                                                
                                            </select>
                                                
                                        </div>

                                        <div class="col-md-6 col-lg-2">       
                                            <label class="col-form-label" for="name">Sub Category<span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control subCat"  id="subCat" name="subCat" >
                                                <option>Please select</option>
                                                
                                            </select>
                                                
                                        </div>

                                        <div class="col-md-6 col-lg-1">       
                                            <label class="col-form-label" for="name">Quantity<span class="text-danger">*</span>
                                            </label>
                                            <input type="number" class="form-control"  id="qty" name="qty"  value="1">
                                                
                                        </div>

                                        <div class="col-md-6 col-lg-2">       
                                            <label class="col-form-label" for="name">Purchase Price<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control"  id="price" name="price" placeholder="Purchase Price" value="{{ old('price') }}">
                                                
                                        </div>

                                        <div class="col-md-6 col-lg-2">       
                                            <label class="col-form-label" for="name">Sales Price<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control"  id="salePrice" name="salePrice" placeholder="Sales Price" value="{{ old('salePrice') }}">
                                                
                                        </div>

                                        <div class="col-md-6 col-lg-1">       
                                            <label class="col-form-label" for="name">Action<span class="text-danger">*</span>
                                            </label>
                                            <button type="submit" class="btn btn-outline-info">Add</button>
                                                
                                        </div>
                                    </div>
                                </form>

                                
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="pull-right">Total Itame ({{Cart::getContent()->count()}}). Total Price ({{ \Cart::getSubTotal() }})</p>
                                <h4 class="card-title">Purchase Product List  </h4>

                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                        @foreach(\Cart::getContent() as $item)
                                        
                                        <tr>
                                            <td>{{ $item->name }}</td>                 
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->salePrice }}</td>
                                            <td>{{ Helpers::get_data_by_id('category_name','product_category','prod_cat_id',$item->category) }}</td>
                                            <td>{{ Helpers::get_data_by_id('category_name','product_category','prod_cat_id',$item->subcategory) }}</td>
                                            <td>
                                                <a href="{{ url('/removecart', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                            </td>
                                        </tr>@endforeach
                                        

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <a href="{{ url('/clearcart') }}" class="btn btn-outline-danger btn-sm pull-right">Clear Cart</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Estimate</h4>
                                <form method="POST" action="{{ url('/pruductPurchase') }}">
                                    @csrf
                                    <div class="form-group col-md-12 col-lg-12">
                                        <label class="col-form-label" for="supp_id">Supplier<span class="text-danger">*</span>
                                        </label>
                                        
                                        <select class="form-control" id="supp_id" name="supp_id">
                                            <option>Please Select</option>
                                            <?php echo Helpers::getListInOption(0,'supp_id','name','suppliers') ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12">
                                        <label class="col-form-label" for="total">Total Price<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="total" id="total" value="{{ \Cart::getSubTotal() }}" readonly>
                                        
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12">
                                        <label class="col-form-label" for="totalPay">Total Pay<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control totalPay" id="totalPay" name="totalPay" value="">
                                        
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12">
                                        <label class="col-form-label" for="totalDue">Total Due<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="totalDue" id="totalDue" value="{{ \Cart::getSubTotal() }}" readonly>
                                        
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12"> 
                                        <button type="submit" class="btn btn-outline-info">Purchase</button>                           
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- #/ container -->
        </div>

@endsection