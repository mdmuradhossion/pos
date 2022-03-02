<?php
namespace App\Helpers;
use App;
use DB;
/**
 * 
 */
class Helpers{

	public static function statusView($status) {

	    if ($status == 1) {
            $row = '<button type="button" class="btn mb-1 btn-success btn-xs">Active</button>';
        }else{
            $row = '<button type="button" class="btn mb-1 btn-secondary btn-xs">In Active</button>';
        }
	    return $row;
	}
	
	public static function globalStatus($selected = 'sel') {
	    $status = [
	        'sel' => '--Select--',
	        '1' => 'Active',
	        '0' => 'Inactive',
	    ];

	    $row = '';
	    foreach ($status as $key => $option) {
	        $row .= '<option value="' . $key . '"';
	        $row .= ($selected == $key) ? ' selected' : '';
	        $row .= '>' . $option . '</option>';
	    }
	    return $row;
	}

	public static function getListInOption($selected, $tblId, $needCol, $table){

        $shops_id = auth()->user()->shops_id;
    	$query = DB::table($table)->where('shops_id','=',$shops_id)->get();
		$options = '';
    	foreach ($query as $value) {
        $options .= '<option value="' . $value->$tblId . '" ';
        $options .= ($value->$tblId == $selected ) ? ' selected="selected"' : '';
        $options .= '>' . $value->$needCol. '</option>';
    	}
		return $options;
    }

    public static function get_data_by_id($needCol, $table, $whereCol, $whereInfo){
		
        $shops_id = auth()->user()->shops_id;	
    	$query = DB::table($table)->select($needCol)->Where(array($whereCol => $whereInfo,'shops_id' => $shops_id))->get();

        $findResult = $query->count();
        $result = $query;
        if ($findResult > 0) {
            foreach ($query as $row ) {
               $col = $row->$needCol;
            }
        }else {
            $col = false;
        }
        return $col;
    }

    public static function default_store_id()
    {
        $shops_id = auth()->user()->shops_id;
        $query = DB::table('store')->select('store_id')->Where(array('is_default' => 1,'shops_id' => $shops_id))->get();
        foreach ($query as $row ) {
               $col = $row->store_id;
        }
        return $col;
    }

    public static function shop_balance(){
        
        $shops_id = auth()->user()->shops_id;   
        $query = DB::table('shops')->select('balance')->Where('shops_id',$shops_id)->get();

        $findResult = $query->count();
        $result = $query;
        if ($findResult > 0) {
            foreach ($query as $row ) {
               $col = $row->balance;
            }
        }else {
            $col = false;
        }
        return $col;
    }

    public static function subCategoryListOption($selected)
        {
            
            $shops_id = auth()->user()->shops_id;   
            $query = DB::table('product_category')->Where( array('parent_pro_cat' => 0,'shops_id' => $shops_id))->get();

            $result = $query;

            $options = '';
            foreach ($result as $value) {
            $options .= '<option value="' . $value->prod_cat_id . '" ';
            $options .= ($value->prod_cat_id == $selected ) ? ' selected="selected"' : '';
            $options .= '>' . $value->category_name. '</option>';
            }
            return $options;
        }

    public static function check()
    {
        $data = "Hi Murad";

        return $data;
    }

}