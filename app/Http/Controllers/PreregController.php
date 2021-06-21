<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use DB;
use Carbon\Carbon;

class PreregController extends Controller
{
    //
    public function __construct(){
    }

    public function post(Request $request){
    	$validatedData = $request->validate([
	        // $request->select => 'required',
	        'ic' => 'required|max:20|min:10',
	        // 'name' => 'required',
	    ]);

	    // if($request->select = 'ic'){
	    // 	$where_field = "Newic";
	    // }else{
	    // 	$where_field = "telhp";
	    // }

	    $pre_episode = DB::table('pre_episode')
	    				->whereDate('adddate', '=', Carbon::now("Asia/Kuala_Lumpur"))
	    				->where('Newic','=', $request->ic);

	   	if($pre_episode->exists()){
	    	return redirect()->back()->withSuccess('You already pre-registered today');
    	}

	    // $pat_mast = DB::table('hisdb.pat_mast')
	    // 				->where($where_field,'=', $request[$request->select]);

	    $add_array = [
			'compcode' => '9A',
			'adddate' => Carbon::now("Asia/Kuala_Lumpur"),
			'Newic' => $request->ic,
	    ];

	    // if($pat_mast->exists()){
	    // 	$pat_mast_obj = $pat_mast->first();
	    // 	$add_array = array_merge($add_array, ['mrn' => $pat_mast_obj->MRN]);
	    // }else{
	    // 	// pleae register at counter alert
	    // 	// $add_array = array_merge($add_array, ['mrn' => '00000']);
	    // }

	    DB::table('pre_episode')->insert($add_array);

    	return redirect()->back()->withSuccess("Thank you, you're succesfully pre-registered");

    }
}