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

class customerController extends Controller
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

        $customers = DB::table('customer')->where('shops_id','=',$shops_id)->get();

        return view('customer/customer_list',compact('customers'));
        //return view('area',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = 1;
        return view('customer/customer_form',compact('status'));
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

        DB::table('customer')->insert($data);
        Session::put('message','Successfully Save');
        return Redirect::to('/customer');

        //print Helpers::ok();
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
        $customers = DB::table('customer')->where('shops_id',$shops_id)->Where('cus_id',$id)->get();
        return view('customer/customer_view',compact('customers'));
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
        $customers = DB::table('customer')->where('shops_id',$shops_id)->Where('cus_id',$id)->get();

        return view('customer/customer_update',compact('customers'));
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

        DB::table('customer')->where('cus_id',$id)->update($data);

        Session::put('message','Successfully Update');
        return Redirect::to('/customer');
    }

    public function updateImage(Request $request, $id)
    {
        // $this->validate($request, [
        //     'image' => 
        //              'required
        //               |image
        //               |mimes:jpeg,png,jpg,gif,svg
        //               |max:1024',
        // ]);
        
        if (Input::hasfile('image')) {
                $file = Input::file('image');
                $file->move(public_path().'/Uplodes/customer/', $file->getClientOriginalName());            
                $image = $file->getClientOriginalName();
            } 

            $data = array('image' => $image );

        DB::table('customer')->where('cus_id',$id)->update($data);
        Session::put('message','Successfully Update');
        return Redirect::to('/customer');
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

    public function _rulse()
    {
        $rules = array('title' => 'required ','description'  => 'required','status' => 'required',);
    $messages = array('title.required' => 'The Title must be required','status.required' => 'The Status must be required','description.required' => 'The Description must be required',);
    $validation = Validator::make(Input::all(), $rules, $messages);
    return $validation;
    }
}
