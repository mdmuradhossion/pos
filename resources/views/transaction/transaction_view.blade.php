@extends('layouts.admin_app')

@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">                
                <li class="breadcrumb-item active"><a href="{{url('/transaction')}}">Transaction List</a></li>

                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    	<h4 class="card-title">Transaction View</h4>
                        <div class="table-responsive">
                            <table class="table header-border">
                                <tbody>
                                	<?php foreach ($transaction as $row) { ?>
                                    <tr class="table-active">
                                    	<td>Transaction Id</td>
                                        <td><?php echo $row->trans_id ?></td>
                                    </tr>
                                    <tr class="table-primary">
                                    	<td>Particulars</td>
                                        <td><?php echo $row->particulars?></td>
                                    </tr>
                                    <tr class="table-success">
                                    	<td>Transaction Type</td>
                                        <td><?php echo $row->transaction_type?></td>
                                    </tr>
                                    <tr class="table-info">
                                    	<td>Amount</td>
                                        <td><?php echo $row->amount?></td>
                                    </tr>
                                <?php }?>
                                    <tr class="table-active">
                                    	<td colspan="2"><a href="{{url('/transaction')}}" class="btn mb-1 btn-rounded btn-outline-secondary btn-sm" id="delete" style="float:right;">Cancel</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    	<!-- <h4 class="card-title">Image</h4> -->
                    	
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

@endsection