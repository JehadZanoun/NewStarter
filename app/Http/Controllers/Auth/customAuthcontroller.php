<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customAuthcontroller extends Controller
{
    public function adult() {

        return view('customAuth.index');
    }

    public function site() {

        return view('site');
    }

}
