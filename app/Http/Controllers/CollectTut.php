<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectTut extends Controller
{
    public function index() {
        $numbers = [1,2,3,4,5];

        $col=collect($numbers);
        return $col;
    }
}
