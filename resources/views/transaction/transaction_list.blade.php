@extends('layouts.admin_app')

@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaction List</a></li>
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
                    	<a href="{{ url('/transaction_form') }}" class="btn mb-1 btn-outline-primary btn-sm pull-right">Add Transaction</a>
                        <h4 class="card-title">Transaction List</h4>

                        <ul class="nav nav-pills mb-3">
                            <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Account Holder List</a>
                            </li>
                            <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Tab Two</a>
                            </li>
                            <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Tab Three</a>
                            </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="navpills-1" class="tab-pane active">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl-12">
                                        <div class="col-lg-12">
					                        <div class="card">
					                            <div class="card-body">
					                                <!-- <h4 class="card-title">Account Holder List</h4> -->
					                                <div class="table-responsive">
                                    					<table class="table table-striped table-bordered zero-configuration">
                                    						<thead>
					                                            <tr>
					                                                <th>Name</th>
					                                                <th>Particulars</th>
					                                                <th>Transaction Type</th>
					                                                <th>amount</th>
					                                                <th>Action</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                		<?php foreach ($transaction as $row) { if ($row->acch_id != 0) { ?>
                        	<tr>
                        		<td><?php echo Helpers::get_data_by_id('name','accountholder','acch_id',$row->acch_id);?></td>
                        		<td><?php echo $row->particulars?></td>
                        		<td><?php echo $row->transaction_type?></td>
                        		<td><?php echo $row->amount?></td>
                        		<td><a href="{{URL::to('view',$row->trans_id)}}" class="btn mb-1 btn-rounded btn-outline-info btn-sm">View</a></td>
                        	</tr>
                		<?php } } ?>
					                                        </tbody>
					                                        <tfoot>
					                                            <tr>
					                                                <th>Name</th>
					                                                <th>Particulars</th>
					                                                <th>Transaction Type</th>
					                                                <th>amount</th>
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
                            </div>
                            <div id="navpills-2" class="tab-pane">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl-2">
                                        <img src="images/big/card-3.png" alt="" class="img-fluid thumbnail m-r-15">
                                    </div>
                                    <div class="col-sm-6 col-md-8 col-xl-10">
                                        <p>Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="navpills-3" class="tab-pane">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl-2">
                                        <img src="images/big/card-1.png" alt="" class="img-fluid thumbnail m-r-15">
                                    </div>
                                    <div class="col-sm-6 col-md-8 col-xl-10">
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
                                        <p>Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p>
                                    </div>
                                </div>
                            </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

@endsection