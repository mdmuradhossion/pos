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

class categoryController extends Controller
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

        $category = DB::table('product_category')->where('shops_id','=',$shops_id)->get();

        return view('category/category_list',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selected = 0;
        return view('category/category_form',compact('selected'));
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
            'category_name' => 'required',
        ]);

        $shops_id = auth()->user()->shops_id;

        $data = array(
            'shops_id' => $shops_id,
            'category_name' => $request->category_name, 
            'parent_pro_cat' => $request->parent_pro_cat,
        );

        DB::table('product_category')->insert($data);
        Session::put('message','Successfully Save');
        return Redirect::to('/category');
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
        $category = DB::table('product_category')->where('shops_id',$shops_id)->Where('prod_cat_id',$id)->get();
        return view('category/category_view',compact('category'));
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
        $category = DB::table('product_category')->where('shops_id',$shops_id)->Where('prod_cat_id',$id)->get();
        return view('category/category_update',compact('category'));
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
            'category_name' => 'required',
        ]);

        $shops_id = auth()->user()->shops_id;

        $data = array(
            'shops_id' => $shops_id,
            'category_name' => $request->category_name, 
            'parent_pro_cat' => $request->parent_pro_cat,
        );

        DB::table('product_category')->where('prod_cat_id',$id)->update($data);
        Session::put('message','Successfully Update');
        return Redirect::to('/category');
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
