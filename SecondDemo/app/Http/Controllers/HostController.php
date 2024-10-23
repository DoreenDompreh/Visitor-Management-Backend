<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Host;

class HostController extends Controller
{
    //Method to list Hosts
    public function listHostResources(Request $request){
        //fetch all data in the hosts table
        $hosts = Host::query()->where('full_name','=','active');

        if(isset($request->search)){
            $hosts = $hosts->where('full_name','LIKE','%request->search%');
        }

        return response([
            'response-message'=>'Host listed successfully';
            'data'=>$hosts->get();
        ], 200);
    }
}
