<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customAuthcontroller extends Controller
{
    public function adelt() {

        return view('customAuth.index');
    }
}
