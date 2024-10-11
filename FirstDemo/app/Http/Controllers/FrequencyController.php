<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frequency;

class FrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listFrequencyResources()
    {
        //fetch all data from the frquency table
        $frequencies = Frequency::all();

        // return response as a json file
        return response()->json($frequencies);
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
