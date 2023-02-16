<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        // Validate data before insert to database



        $rules = $this->getRules();
        $messages = $this->getMessages();


        $validate = Validator::make($request->all(),$rules,$messages);

//        $validate = Validator::make($request->all(),[],[]


        if($validate->fails()){
//            return $validate->errors()->first();
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }



        //insert
        Offer::create([
            'name' => $request->name ,
            'price' => $request->price,
            'details' => $request->details,

        ]);
        return redirect()->back()->with(['success' => 'تم اضافة العرض بنجاح']);

    }

    protected function getRules(): array
    {
        return $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required'
        ];
    }

    protected function getMessages(): array
    {
        return $massages = [
            'name.required' => __('messages.offersName required'),
            'name.unique' => __('messages.offersName must be  unique'),
            'price.required' => __('messages.offersPrice required'),
            'price.numeric' => __('messages.offersPrice must be numeric'),
            'details.required' => __('messages.offersDetails Must be Details required'),
        ];
    }


}
