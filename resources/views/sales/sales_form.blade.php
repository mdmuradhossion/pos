@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/sales_form')}}">Sales Create</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/sales')}}">Sales List</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Sales Create</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

						<div class="input-group col-md-6 col-lg-12">
                            <div class="input-group-prepend"><span class="input-group-text">Input</span></div>
                            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Product Name/ID" >
                            <div class="input-group-append"><span class="input-group-text">Go</span></div>
                        </div>

                        <div class="col-md-6 col-lg-12" id="result">
                        	
                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <p class="pull-right">Total Itame ({{Cart::getContent()->count()}}). Total Price ({{ \Cart::getSubTotal() }})</p>
                        <h4 class="card-title">Sales Product List  </h4>

                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Sale Price</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                @foreach(\Cart::getContent() as $item)
                                
                                <tr>
                                    <td>{{ $item->name }}</td>                 
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>
                                        <a href="{{ url('/removecartsale', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                    </td>
                                </tr>@endforeach
                                

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th> 
                                    <th>Sub Total</th>                       
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <a href="{{ url('/clearcartsale') }}" class="btn btn-outline-danger btn-sm pull-right">All Clear</a>
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
                        <form method="POST" action="{{ url('/pruductSale') }}">
                            @csrf
                            <div class="form-group col-md-12 col-lg-12">
                                <ul class="nav nav-pills mb-3">
                                    <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Register Customer</a>
                                    </li>
                                    <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Customer</a>
                                    </li>
                                </ul>

                                <div class="tab-content br-n pn">
                                    <div id="navpills-1" class="tab-pane active">
                                        <div class="row align-items-center">
                                            <select class="form-control" id="customarValid" name="cus_id">
                                                <option value="0">Please Select</option>
                                                <?php echo Helpers::getListInOption(0,'cus_id','name','customer') ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                        <div class="row align-items-center">
                                            <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Input Name">
                                        </div>
                                    </div>
                                </div>
                                <!-- <label class="col-form-label" for="supp_id">Customer<span class="text-danger">*</span>
                                </label>
                                
                                 -->
                            </div>

                            <div class="form-group col-md-12 col-lg-12">
                                <label class="col-form-label" for="vat">Vat %<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control vat" name="vat" id="vat" placeholder="0%">
                                
                            </div>

                            <div class="form-group col-md-12 col-lg-12">
                                <label class="col-form-label" for="total">Total Price<span class="text-danger">*</span>
                                </label>
                                <input type="hidden" id="grandtotal" value="{{ \Cart::getSubTotal() }}" readonly>
                                <input type="text" class="form-control " name="total" id="total" value="{{ \Cart::getSubTotal() }}" readonly>
                                
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
                                <span id="reg"><div class="alert alert-danger">Please Select Customer!</div></span>              
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