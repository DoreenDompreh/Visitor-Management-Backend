<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Host;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listHostResources()
    {
        //fetch all data from the hosts table
        $hosts = Host::query()->where('status', '=', 'active')->get();

        //return response as json file
        return response()->json($hosts);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
