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

class salesController extends Controller
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

        $sales = DB::table('purchase')->where('shops_id','=',$shops_id)->get();

        return view('sales/sales_list',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales/sales_form',compact('sales'));
    }


    public function productSearch(Request $request)
    {

        if ($request->ajax()) {

            $shops_id = auth()->user()->shops_id;

            $query = DB::table('products')->where([['shops_id', '=', $shops_id],['quantity', '>', 0],['name','LIKE','%'.$request->keyword.'%'],])->orWhere([['shops_id', '=', $shops_id],['quantity', '>', 0],['prod_id','LIKE','%'.$request->keyword.'%'],])->get();
            
        }

        return Response(view('sales/results',compact('query')));
    }
    

    public function addToCart(Request $request)
    {
        if ($request->qty > 0 ) {        
            $subtotal = $request->qty * $request->price;
            // $options = $request->except('_token','price', 'qty');

            $query = Cart::add(uniqid(), $request->input('name'), $request->input('price'), $request->input('qty'),$request->input('productId'),$subtotal);

             
            Session::put('message','Item added to cart successfully.');
            return Redirect::to('/sales_form');
        }else{
            Session::put('message','Product Quantity Is To Low !!!');
            return Redirect::to('/sales_form');
        }
    }

    public function clearCart()
    {
        Cart::clear();
        return Redirect::to('/sales_form');
    }

    public function removeCart($id)
    {
        Cart::remove($id);
        return Redirect::to('/sales_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shops_id = auth()->user()->shops_id;

        

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
