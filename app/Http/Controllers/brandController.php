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

class brandController extends Controller
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

        $brand = DB::table('brand')->where('shops_id','=',$shops_id)->get();

        return view('brand/brand_list',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand/brand_form',compact('brand'));
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
        ]);

        $shops_id = auth()->user()->shops_id;
        $data = array(
            'shops_id' => $shops_id,
            'name' => $request->name,
        );

        if (!empty($request->image) ) {
            if (Input::hasfile('image')) {
                $file = Input::file('image');
                $file->move(public_path().'/Uplodes/brand/', $file->getClientOriginalName());            
                $imageName = $file->getClientOriginalName();
            } 

            $data['image'] = $imageName;
        }
        
        DB::table('brand')->insert($data);
        Session::put('message','Successfully Update');
        return Redirect::to('/brand');
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
        $brand = DB::table('brand')->where('shops_id',$shops_id)->Where('brand_id',$id)->get();
        return view('brand/brand_view',compact('brand'));
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
        $brand = DB::table('brand')->where('shops_id',$shops_id)->Where('brand_id',$id)->get();
        return view('brand/brand_update',compact('brand'));
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
        ]);

        $shops_id = auth()->user()->shops_id;
        $data = array(
            'name' => $request->name,
        );

        DB::table('brand')->where('brand_id',$id)->update($data);

        Session::put('message','Successfully Update');
        return Redirect::to('/brand');
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $shops_id = auth()->user()->shops_id;
        if (!empty($request->image) ) {
            if (Input::hasfile('image')) {
                $file = Input::file('image');
                $file->move(public_path().'/Uplodes/brand/', $file->getClientOriginalName());            
                $imageName = $file->getClientOriginalName();
            } 

            $data['image'] = $imageName;
        }

        DB::table('brand')->where('brand_id',$id)->update($data);

        Session::put('message','Successfully Update');
        return Redirect::to('/brand');
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
