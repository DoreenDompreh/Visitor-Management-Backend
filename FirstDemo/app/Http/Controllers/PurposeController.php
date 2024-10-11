<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purpose;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listPurposeResources()
    {
        //fetch all data from the purposes table
        $purposes = Purpose::query()->where('status', '=', 'active')->get();

        //return response as json file
        return response()->json($purposes);
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
