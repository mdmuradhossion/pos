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

class transactionController extends Controller
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

        $transaction = DB::table('transaction')->where('shops_id',$shops_id)->get();

        return view('transaction/transaction_list',compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction/transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shops_id = auth()->user()->shops_id;

        $transaction = DB::table('transaction')->where(array('trans_id' => $id,'shops_id' => $shops_id, ))->get();

        return view('transaction/transaction_view',compact('transaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function accountholder(Request $request)
    {
        DB::beginTransaction();
        try {
                $shops_id = auth()->user()->shops_id;

                //insert accountholder transaction in transaction table (start)
                $data = array(
                    'shops_id' => $shops_id,
                    'acch_id' => $request->acch_id,
                    'particulars' => $request->particulars,
                    'transaction_type' => $request->transaction_type,
                    'amount' => $request->amount,
                );
                DB::table('transaction')->insert($data);
                $transactionId = DB::getPdo()->lastInsertId();
                //insert accountholder transaction in transaction table (start)



                if ($request->transaction_type == "Dr.") {
                    
                    // calculet transaction amount and update accountholder balance(start)
                    $balanceAcc = Helpers::get_data_by_id('balance','accountholder','acch_id',$request->acch_id); 
                    $restBalanceAcc = $balanceAcc - $request->amount;
                    $upBalanceAcc = array(
                        'balance' => $restBalanceAcc, 
                    );
                    DB::table('accountholder')->where('acch_id',$request->acch_id)->update($upBalanceAcc);                     
                    // calculet transaction amount and update accountholder balance(start)


                    //Create accountholder Ledgar (start)
                    $ledUpData = array(
                        'shops_id' => $shops_id,
                        'acch_id' => $request->acch_id,
                        'trans_id' => $transactionId, 
                        'particulars' => $request->particulars,
                        'transaction_type' => $request->transaction_type,
                        'amount' => $request->amount,
                        'rest_balance' => $restBalanceAcc,
                    );
                    DB::table('accountholder_ledgar')->insert($ledUpData);
                    //Create accountholder Ledgar (start)


                    //calculet transaction amount and update shops Balance (start)
                    $ShopsBalance = Helpers::shop_balance();
                    $shopRestbalance = $ShopsBalance + $request->amount;
                    $upShopData = array(
                        'balance' => $shopRestbalance, 
                    );
                    DB::table('shops')->where('shops_id',$shops_id)->update($upShopData);
                    //calculet transaction amount and update shops Balance (end)


                    //Create accountholder Ledgar (start)
                    $shopLedUpData = array(
                        'shops_id' => $shops_id,
                        'trans_id' => $transactionId, 
                        'particulars' => $request->particulars,
                        'transaction_type' => $request->transaction_type,
                        'amount' => $request->amount,
                        'rest_balance' => $shopRestbalance,
                    );
                    DB::table('shops_ledgar')->insert($shopLedUpData);
                    //Create accountholder Ledgar (start)
                    
                }else{

                    // calculet transaction amount and update accountholder balance(start)
                    $balanceAcc = Helpers::get_data_by_id('balance','accountholder','acch_id',$request->acch_id); 
                    $restBalanceAcc = $balanceAcc + $request->amount;
                    $upBalanceAcc = array(
                        'balance' => $restBalanceAcc, 
                    );
                    DB::table('accountholder')->where('acch_id',$request->acch_id)->update($upBalanceAcc);                     
                    // calculet transaction amount and update accountholder balance(start)


                    //Create accountholder Ledgar (start)
                    $ledUpData = array(
                        'shops_id' => $shops_id,
                        'acch_id' => $request->acch_id,
                        'trans_id' => $transactionId, 
                        'particulars' => $request->particulars,
                        'transaction_type' => $request->transaction_type,
                        'amount' => $request->amount,
                        'rest_balance' => $restBalanceAcc,
                    );
                    DB::table('accountholder_ledgar')->insert($ledUpData);
                    //Create accountholder Ledgar (start)


                    //calculet transaction amount and update shops Balance (start)
                    $ShopsBalance = Helpers::shop_balance();
                    $shopRestbalance = $ShopsBalance - $request->amount;
                    $upShopData = array(
                        'balance' => $shopRestbalance, 
                    );
                    DB::table('shops')->where('shops_id',$shops_id)->update($upShopData);
                    //calculet transaction amount and update shops Balance (end)


                    //Create accountholder Ledgar (start)
                    $shopLedUpData = array(
                        'shops_id' => $shops_id,
                        'trans_id' => $transactionId, 
                        'particulars' => $request->particulars,
                        'transaction_type' => $request->transaction_type,
                        'amount' => $request->amount,
                        'rest_balance' => $shopRestbalance,
                    );
                    DB::table('shops_ledgar')->insert($shopLedUpData);
                    //Create accountholder Ledgar (start)
                }

        DB::commit();
        // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
        
        Session::put('message','Successfully Save');
        return Redirect::to('/transaction');
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
