@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/supplier_ledgar')}}">Supplier Ledgar</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    	<!-- <a href="{{ url('/category_form') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Category</a> -->
                        <h4 class="card-title">Supplier Ledgar</h4>
                        
                        <div class="col-md-6 col-lg-6">
                            <select id="select-state" placeholder="Pick a suppliers..." class="supp_id" name="supp_id" id="supp_id"  >
                                <option value="">Select a state...</option>
                                <?php echo Helpers::getListInOption(0,'supp_id','name','suppliers')?>
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <h4 class="card-title">Supplier Ledgar View</h4>
                        
                        <div class="table-responsive " id="suppLedg">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->



</div>
@endsection