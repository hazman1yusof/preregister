<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use DB;

class PreregController extends Controller
{
    //
    public function __construct(){
    }

    public function post(Request $request){
    	$validatedData = $request->validate([
	        $request->select => 'required',
	    ]);

	    if($request->select = 'ic'){
	    	$where_field = "Newic";
	    }else{
	    	$where_field = "telhp";
	    }

	    $pat_mast = DB::table('hisdb.pat_mast')
	    				->where($where_field,'=', $request[$request->select]);

	    if($pat_mast->exists()){
	    	$pat_mast_obj = $pat_mast->first();
	    	$pre_episode = DB::table('hisdb.pre_episode')->where('mrn','=',$pat_mast_obj->MRN);

	    	if($pre_episode->exists()){
	    		return redirect()->back()->withSuccess('Patient already pre-registered');
	    	}else{
	    		DB::table('hisdb.pre_episode')
	    			->insert([
	    				'compcode' => '9A',
	    				'mrn' => $pat_mast_obj->MRN
	    			]);

	    		return redirect()->back()->withSuccess('Patient succesfully pre-registered');
	    	}
	    }else{
	    	return redirect()->back()->withErrors(['Patient doesnt exists','or wrong handphone or ic']);
	    }

    }
}