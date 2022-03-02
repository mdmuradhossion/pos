@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/customer_ledgar')}}">Customer Ledgar</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    	<!-- <a href="{{ url('/category_form') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Category</a> -->
                        <h4 class="card-title">Customer Ledgar</h4>
                        <div class="col-md-6 col-lg-6">
	                        <select id="select-state" class="cus_id" placeholder="Pick a customer..." name="cus_id" id="cus_id">
							    <option value="">Select a state...</option>
							    <?php echo Helpers::getListInOption(0,'cus_id','name','customer')?>
							</select>
						</div>
                        
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <h4 class="card-title">Customer Ledgar View</h4>
                        
                        <div class="table-responsive " id="custLedg">
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- #/ container -->



</div>
@endsection