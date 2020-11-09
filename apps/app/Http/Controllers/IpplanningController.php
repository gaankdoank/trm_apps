<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpplanningController extends Controller
{
    public function index() {
    	$data = array(['state' => '1', 'ip_address' => '238'],['state' => '1', 'ip_address' => '123']);
    	//echo $data->state;
        return view('trm/ip_planning/rsl_monitoring',['monitoring' => $data]);
    }
}
