<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckInOutController extends Controller
{

    public function checkInStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'base_64image' => 'required'
        ]);

        if ($validator->fails()) {
            $responsevalues = array(
                "response_message" => 'Validation Errors',
                'errors' => $validator->errors()->toArray()
            );
            return response($responsevalues, 400);
        }

        $externalImageId = rand(0,90);

            //check Rekognition if Face exists
            //if no return 404
            //if yes, get ExternalImageId from the SearchFacesByImage() AWS
            //use that in getting the visitor details and return results in API

        return response(["response_message"=>"CheckIn Status",
                         "external_image_id"=>$externalImageId
            ],200);

    }


    //for new visitors
    public function saveVisitorDetailAndCheckIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|in:checkin,checkout',
            'full_name' => 'required',
            'company' => 'required',
            'designation' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'base_64image' => 'required',
            'number_of_visitors' => 'int|nullable',
            'purpose' => 'string|nullable',
            'is_recurring_visits' => 'boolean|nullable',
            'start_date' => 'string|nullable',
            'end_date' => 'string|nullable',
            'host_id' => 'int|required',

        ]);

        if ($validator->fails()) {
            $responsevalues = array(
                "response_message" => 'Validation Errors',
                'errors' => $validator->errors()->toArray()
            );
            return response($responsevalues, 400);
        }

        //save visitor details in DB and return id
        //pass ID as ExternalImageId when saving image on rekog

        //check visitor in using visitor ID (add to visits table)


    }

    //for existing visitors
    public function checkIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'purpose' => 'string|nullable',
            'number_of_visitors' => 'int|nullable',
            'host_id' => 'int|required',
            'visitor_id' => 'int|required',
            'is_recurring_visits' => 'boolean|nullable',
            'start_date' => 'string|nullable',
            'end_date' => 'string|nullable',

        ]);


        if ($validator->fails()) {
            $responsevalues = array(
                "response_message" => 'Validation Errors',
                'errors' => $validator->errors()->toArray()
            );
            return response($responsevalues, 400);
        }

       //add to visits table

    }


}
