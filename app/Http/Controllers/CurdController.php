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



}
