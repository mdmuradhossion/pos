@extends('layouts.admin_app')

@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/transaction') }}">Transaction List</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaction</h4>
                        <center><b style="font-size: 18px; color: green;"><?php $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message',null);
                                } ?></b></center>
                        <ul class="nav nav-pills mb-3">
                            <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Account Holder</a>
                            </li>
                            <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Tab Two</a>
                            </li>
                            <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Tab Three</a>
                            </li>
                        </ul>
                        <div class="tab-content br-n pn">
                            <div id="navpills-1" class="tab-pane active">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl-8">
                                        <div class="col-lg-12">
					                        <div class="card">
					                            <div class="card-body">
					                                <h4 class="card-title">Account Holder</h4>
					                                <div class="basic-form">
			<form class="form-valide" action="{{ url('/accountholder_transaction') }}" method="post">
                                        @csrf
					                                        
            <div class="form-group">
                <label>Account Holder</label>
                <select class="form-control" name="acch_id" required>
                    <option>Please Select</option>
                    <?php echo Helpers::getListInOption('acch_id','acch_id','name','accountholder');?>
                </select>
            </div>

            <div class="form-group">
                <label>Particulars <?php print Helpers::check();?></label>
                <input type="text" class="form-control" name="particulars" placeholder="Particulars" required>
            </div>

            <div class="form-group">
                <label>Transaction Type</label>
                <select class="form-control" name="transaction_type" required>
                    <option value="">Please Select</option>
                    <option value="Dr.">Debit</option>
                    <option value="Cr.">Credit</option>
                </select>
                <small>Note: Amount Get(Debit) Or Pay(Credit)</small>
            </div>

            <div class="form-group">
                <label>Amount</label>
                <input type="text" class="form-control" placeholder="Amount" name="amount" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>

					                                    </form>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
                                    </div>

                                    <div class="col-sm-6 col-md-8 col-xl-4">
                                        
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
</div>
@endsection