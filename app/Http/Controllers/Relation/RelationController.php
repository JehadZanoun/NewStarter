<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function hasOneRelation() {

        $user = \App\Models\User::with(['phone' => function($q){
            $q -> select(['code', 'phone', 'user_id']);
        }])->find(15);


//        $user = \App\Models\User::whereHas('phone',function($q){
//            $q -> select(['code', 'phone', 'user_id']);
//        })->find(15);

//        return $user -> phone ;

        return response() -> json ($user);
    }
}
