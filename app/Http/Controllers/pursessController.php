<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use DB;
use Helpers;
use Cart;

use Session;
session_start();

class pursessController extends Controller
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

        $purchase = DB::table('purchase')->where('shops_id','=',$shops_id)->get();

        return view('purchase/purchase_list',compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops_id = auth()->user()->shops_id;
        $cart = new Cart;
        return view('purchase/purchase_form',compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function categorysearch(Request $request)
    {    
        
        if ($request->ajax()) {

            $shops_id = auth()->user()->shops_id;            

            $query = DB::table('product_category')->Where( array('parent_pro_cat' => $request->id,'shops_id' => $shops_id))->get();

            foreach ($query as $row) {             
                $options = '<option value="' . $row->prod_cat_id . '" >'.$row->category_name. '</option>';

                $data = print $options;
            }
        }

        return Response($data);
    }


    public function cartAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'salePrice' => 'required|numeric',
            'cat_id' => 'required|numeric',
            'subCat' => 'required|numeric',
        ]);
        
        $options = $request->except('_token','price', 'qty');

        $query = Cart::add(uniqid(), $request->input('name'), $request->input('price'), $request->input('qty'),$request->input('salePrice'),$request->input('cat_id'),$request->input('subCat'), $options);

         
        Session::put('message','Item added to cart successfully.');
        return Redirect::to('/purchase_form');
    }

    public function clearCart()
    {
        Cart::clear();
        return Redirect::to('/purchase_form');
    }

    public function removeCart($id)
    {
        Cart::remove($id);
        return Redirect::to('/purchase_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supp_id' => 'required|numeric',
        ]);

        $shops_id = auth()->user()->shops_id;

        $storId = Helpers::default_store_id();
        $shopBalance = Helpers::shop_balance();

        $supp_id = $request->supp_id;
        $total = $request->total;
        $totalPay = $request->totalPay;
        $totalDue = $request->totalDue;


        if ($shopBalance >= $totalPay) {

            DB::beginTransaction();
            try {


                //insert Purchase in purchase table(Start)
                $purData = array(
                    'shops_id' => $shops_id, 
                    'supp_id' => $supp_id, 
                    'amount' => $total, 
                    'cash' => $totalPay, 
                    'due' => $totalDue, 
                );
                DB::table('purchase')->insert($purData);
                $purchaseId = DB::getPdo()->lastInsertId();
                //insert Purchase in purchase table(Start)



                // suppliers balance update (start)
                $suppBalance = Helpers::get_data_by_id('balance','suppliers','supp_id',$supp_id);
                $restFirstBalanceSupp = $suppBalance - $total;
                $supFirstData = array(
                    'balance' => $restFirstBalanceSupp, 
                );
                DB::table('suppliers')->where('supp_id',$supp_id)->update($supFirstData);
                // suppliers balance update (start)



                // suppliers ledgar create (Start)
                $supFirstLedg = array(
                    'shops_id' => $shops_id, 
                    'supp_id' => $supp_id, 
                    'purch_id' => $purchaseId,
                    'particulars' => 'Purchase Product Amount', 
                    'trangaction_type' => 'Dr.', 
                    'amount' => $total, 
                    'rest_balance' => $restFirstBalanceSupp, 
                );
                DB::table('suppliers_ledgar')->insert($supFirstLedg);
                // suppliers ledgar create (Start)



                if (!empty($totalPay)) {
                    
                    // Shops cash and pay amount calculer or update Shops cash(Start)
                    $restBalanceShop = $shopBalance - $totalPay ;

                    $shopData = array(
                        'balance' => $restBalanceShop, 
                    );
                    DB::table('shops')->where('shops_id',$shops_id)->update($shopData);
                    // Shops cash and pay amount calculer or update Shops cash(Start)


                    //shops ladger create (start)
                    $shopLedData = array(
                        'shops_id' => $shops_id,
                        'supp_id' => $supp_id, 
                        'purch_id' => $purchaseId,
                        'particulars' => 'Product Purchase To Pay Supplier',
                        'transaction_type' => 'Cr.',
                        'amount' => $totalPay,
                        'rest_balance' => $restBalanceShop,
                    );
                    DB::table('shops_ledgar')->insert($shopLedData);
                    //shops ladger create (start)


                    // suppliers balance update (start)
                    $suppBalancenew = Helpers::get_data_by_id('balance','suppliers','supp_id',$supp_id);
                    $restBalanceSupp = $suppBalancenew + $totalPay;
                    $supData = array(
                        'balance' => $restBalanceSupp, 
                    );
                    DB::table('suppliers')->where('supp_id',$supp_id)->update($supData);
                    // suppliers balance update (start)



                    // suppliers ledgar create (Start)
                    $supFirstLedg = array(
                        'shops_id' => $shops_id, 
                        'supp_id' => $supp_id,
                        'purch_id' => $purchaseId, 
                        'particulars' => 'Purchase Product To Pay Amount', 
                        'trangaction_type' => 'Cr.', 
                        'amount' => $totalPay, 
                        'rest_balance' => $restBalanceSupp, 
                    );
                    DB::table('suppliers_ledgar')->insert($supFirstLedg);
                    // suppliers ledgar create (Start)

                }




                foreach(\Cart::getContent() as $item){
                    //insert product in product table(start)
                    $data = array(
                        'shops_id' => $shops_id, 
                        'supp_id' => $supp_id, 
                        'store_id' => $storId, 
                        'name' => $item->name, 
                        'prod_cat_id' => $item->subcategory, 
                        'quantity' => $item->quantity, 
                        'purchase_price' => $item->price, 
                        'selling_price' => $item->salePrice, 
                    );
                    DB::table('products')->insert($data);
                    $productId = DB::getPdo()->lastInsertId();
                    //insert product in product table(end)

                    //insert pursess Itame in purchase item table(Start)
                    $itemTtotalPrice = $item->quantity * $item->price;

                    $parchData = array(
                        'purch_id' => $purchaseId, 
                        'prod_id' => $productId, 
                        'purch_price' => $item->price, 
                        'quantity' => $item->quantity, 
                        'total_price' => $itemTtotalPrice, 
                    );
                    DB::table('purchase_item')->insert($parchData);
                    //insert pursess Itame in purchase item table(Start)
                }


            DB::commit();
            // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
            }

            Cart::clear();
            Session::put('message','Successfully Save');
            return Redirect::to('/purchase');

        }else{
            Session::put('message','Not Enough Balance !!');
            return Redirect::to('/purchase_form');
        }


        
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
