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

class supplierController extends Controller
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

        $suppliers = DB::table('suppliers')->where('shops_id','=',$shops_id)->get();

        return view('supplier/supplier_list',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = 1;
        return view('supplier/supplier_form',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'status' => 'required',
        ]);

        $shops_id = auth()->user()->shops_id;

        $data = array(
            'shops_id' => $shops_id,
            'name' => $request->name, 
            'phone' => $request->phone,
            'balance' => 0,
            'address' => $request->address,
            'status' => $request->status,
        );

        DB::table('suppliers')->insert($data);
        Session::put('message','Successfully Save');
        return Redirect::to('/supplier');
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
        $suppliers = DB::table('suppliers')->where('shops_id',$shops_id)->Where('supp_id',$id)->get();
        return view('supplier/supplier_view',compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shops_id = auth()->user()->shops_id;
        $supplier = DB::table('suppliers')->where('shops_id',$shops_id)->Where('supp_id',$id)->get();

        return view('supplier/supplier_update',compact('supplier'));
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
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'status' => 'required',
        ]);
        
        $data = array(
            'name' => $request->name, 
            'phone' => $request->phone, 
            'address' => $request->address,
            'status' => $request->status, 
        );

        DB::table('suppliers')->where('supp_id',$id)->update($data);

        Session::put('message','Successfully Update');
        return Redirect::to('/supplier');
    }

    public function updateImage(Request $request, $id)
    {
        if (Input::hasfile('image')) {
            $file = Input::file('image');
            $file->move(public_path().'/Uplodes/supplier/', $file->getClientOriginalName());            
            $image = $file->getClientOriginalName();
            } 

            $data = array('image' => $image );

        DB::table('suppliers')->where('supp_id',$id)->update($data);
        Session::put('message','Successfully Update');
        return Redirect::to('/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        print "OK";
    }
}
