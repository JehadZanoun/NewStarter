<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hosbital;
use App\Models\mobile;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function hasOneRelation() {

        $user = \App\Models\User::with(['phone' => function($q){
            $q -> select(['code', 'phone', 'user_id']);
        }])->find(15);
        //return $user -> name;
        return $user -> phone -> code;


//        $user = \App\Models\User::whereHas('phone',function($q){
//            $q -> select(['code', 'phone', 'user_id']);
//        })->find(15);

//        return $user -> phone ;

        return response() -> json ($user);
    }

    public function hasOneRelationRevers() {

         $mobile = mobile::find(1);

        //make some attribute visible
        $mobile -> MakeVisible(['user_id']);
        //$mobile -> MakeHidden(['code']);
       // return $mobile;

        //get all data mobile + user

        //$mobile = mobile::with('user')->find(1);

        //return $mobile;

        //return $mobile -> user;

        $mobile = mobile::with(['user'=> function($q){
            $q ->select(['id', 'name']);
        }])->find(1);
        return $mobile;

    }

    public function getUserHasPhone(){
        return User::whereHas('phone')->get();

    }

    public function getUserHasPhoneWithCondition(){

        return User::whereHas('phone', function($q){
            $q ->where('code','02');
        })->get();

    }
    public function getUserNotHasPhone(){
        return User::whereDoesntHave('phone')->get();
    }

    ##################### Begin ONe Many Relationship  ##################################

    public function getHospitalDoctors() {
//       $hospital =  Hosbital::find(1);
        //Hosbital::Where('id')->first();
        //Hosbital::first();
        //return $hospital-> doctors;


        $hospital =  Hosbital::with('doctors')->find(1);
        //return $hospital;
        //return $hospital->name;

        $doctors = $hospital-> doctors;
        foreach ($doctors as $doctor){
           echo $doctor -> name.'<br>';
        }

       $doctor = Doctor::find(3);
        return $doctor->hospital;


    }


}
