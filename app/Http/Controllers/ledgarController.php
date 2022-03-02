<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use DB;
use Helpers;
use Session;
session_start();

class ledgarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $shops_id = auth()->user()->shops_id;

        $ledgar = DB::table('shops_ledgar')->where('shops_id',$shops_id)->get();

        return view('ledgar/shop_ledgar',compact('ledgar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerLedgar()
    {
        $shops_id = auth()->user()->shops_id;

        return view('ledgar/customer_ledgar');
    }

    public function customerLedgarSearch(Request $request)
    {
        if ($request->ajax()) {
            $shops_id = auth()->user()->shops_id;
            $query = DB::table('customer_ledgar')->Where( array('cus_id' => $request->id,'shops_id' => $shops_id))->get();

                $table = '<b>Name: '.Helpers::get_data_by_id('name','customer','cus_id',$request->id).'</b> <b class="pull-right" >Balance: '.Helpers::get_data_by_id('balance','customer','cus_id',$request->id).'</b>';        
                $table .='<table class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        foreach ($query as $row) {
                          $table .='<tr>
                                        <td>'.$row->created_at.'</td>
                                        <td>'.$row->particulars.'</td>
                                        <td>'.$row->cus_id.'</td>
                                        <td>'.$row->trangaction_type.'</td>
                                        <td>'.$row->amount.'</td>
                                        <td>'.$row->rest_balance.'</td>
                                    </tr>';
                        }
                                           
                        $table .='</tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
                                    </tr>
                                </tfoot>
                            </table>';
        }

        return Response($table);
    }

    public function supplierLedgar()
    {
        $shops_id = auth()->user()->shops_id;

        return view('ledgar/supplier_ledgar');
    }

    public function supplierLedgarSearch(Request $request)
    {
        if ($request->ajax()) {

            $shops_id = auth()->user()->shops_id;            

            $query = DB::table('suppliers_ledgar')->Where( array('supp_id' => $request->id,'shops_id' => $shops_id))->get();

                $table = '<b>Name: '.Helpers::get_data_by_id('name','suppliers','supp_id',$request->id).'</b> <b class="pull-right" >Balance: '.Helpers::get_data_by_id('balance','suppliers','supp_id',$request->id).'</b>';        
                $table .='<table class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        foreach ($query as $row) {
                          $table .='<tr>
                                        <td>'.$row->created_at.'</td>
                                        <td>'.$row->particulars.'</td>
                                        <td>'.$row->purch_id.'</td>
                                        <td>'.$row->trangaction_type.'</td>
                                        <td>'.$row->amount.'</td>
                                        <td>'.$row->rest_balance.'</td>
                                    </tr>';
                        }
                                           
                        $table .='</tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
                                    </tr>
                                </tfoot>
                            </table>';               
            
        }

        return Response($table);
    }

    public function accountHolderLedgar()
    {
        $shops_id = auth()->user()->shops_id;

        return view('ledgar/account_holder_ledgar');
    }

    public function accountholderLedgarSearch(Request $request)
    {
        if ($request->ajax()) {

            $shops_id = auth()->user()->shops_id;            

            $query = DB::table('accountholder_ledgar')->Where( array('acch_id' => $request->id,'shops_id' => $shops_id))->get();

                $table = '<b>Name: '.Helpers::get_data_by_id('name','accountholder','acch_id',$request->id).'</b> <b class="pull-right" >Balance: '.Helpers::get_data_by_id('balance','accountholder','acch_id',$request->id).'</b>';        
                $table .='<table class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        foreach ($query as $row) {
                          $table .='<tr>
                                        <td>'.$row->created_at.'</td>
                                        <td>'.$row->particulars.'</td>
                                        <td>'.$row->acch_id.'</td>
                                        <td>'.$row->trangaction_type.'</td>
                                        <td>'.$row->amount.'</td>
                                        <td>'.$row->rest_balance.'</td>
                                    </tr>';
                        }
                                           
                        $table .='</tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Memo</th>
                                        <th>Dr/Cr</th>
                                        <th>Amount</th>
                                        <th>Rest Balance</th>
                                    </tr>
                                </tfoot>
                            </table>'; 
        }
        return Response($table);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
