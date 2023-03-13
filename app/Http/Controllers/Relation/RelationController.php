<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hosbital;
use App\Models\mobile;
use App\Models\Service;
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

    public function hospitals() {

        $hosbital = Hosbital::select('id', 'name', 'address')->get();

        return view('doctors.hospitals', compact('hosbital'));
    }

    public function doctors($hospital_id){

       $hospital = Hosbital::find($hospital_id);
        $doctors = $hospital-> doctors;
        return view('doctors.doctors',compact('doctors'));

    }

    public function hospitalsHasDoctor() {
       return $hospitals = Hosbital::whereHas('doctors')->get();
    }

    public function hospitalsHasOnlyMaleDoctor() {
        return $hospitals = Hosbital::with('doctors')->whereHas('doctors', function($q){
            $q->where('gender', 1);
        })->get();

    }

    public function hospitalsNotHasDoctor() {
        return Hosbital::whereDoesntHave('doctors')->get();
    }

    public function deleteHospital($hospital_id) {
        $hospital = Hosbital::find($hospital_id);

        if(!$hospital)
            return abort('404');
            $hospital ->doctors() ->delete();
            $hospital->delete();
            return redirect()->route('hospital.all');

    }

    public function getDoctorServices() {
//        $doctor = Doctor::find(3);
//        return $doctor -> services;

        return $doctor = Doctor::with('services')->find(3);

    }

    public function getServiceDoctor() {
//        return $doctor = Service::with('doctors')->find(1);

        return $doctor = Service::with(['doctors'=>function($q) {
            $q->select('doctors.id', 'name', 'title');
        }])->find(1);

    }

    public function getDoctorServicesById($doctorId) {
        $doctor = Doctor::find($doctorId);
        $services = $doctor->services;


        $doctors = Doctor::select('id', 'name') ->get();
        $allServices = Service::select('id', 'name') ->get();

        return view('doctors.services', compact('services', 'doctors', 'allServices'));
    }

}
