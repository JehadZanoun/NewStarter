<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class offerController extends Controller
{

    //viwe from to add this offer
    public function create() {
        return view('ajaxoffers.created');

    }

    //save offer into DB using AJAX
    public function store(Request $request) {

        $file_name = $this->saveImage($request->photo, 'images/offers');


        //insert table offers in database
        Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,


        ]);


    }
}
