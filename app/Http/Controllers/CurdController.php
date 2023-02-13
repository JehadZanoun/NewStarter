<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class CurdController extends Controller
{

    public function __construct()
    {
    }




    public function getOffers() {

       return Offer:: get();
    }

  /*  public function store() {
        Offer::create([
            'name' => 'offers three',
            "price" => '6000',
            'details' => 'offer details',
        ]);
    } */

    public function create() {
        return view('offers.created');
    }

    public function store(Request $request): string
    {
//        return $request;

        //validate data before insert to database


        //insert

        Offer::create([
            'name' => $request -> name ,
            'price' => $request -> price,
            'details' => $request -> details,

        ]);
        return 'Saved Successfully';




    }


}
