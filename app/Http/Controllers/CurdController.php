<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTriat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CurdController extends Controller
{
    use OfferTriat;

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

    public function store(OfferRequest $request)
    {
        //***********Move to OfferRequest ****************

        // Validate data before insert to database



//        $rules = $this->getRules();
//        $messages = $this->getMessages();


        //$validate = Validator::make($request->all(),$rules,$messages);

//        $validate = Validator::make($request->all(),[],[]


        //if($validate->fails()){
//            return $validate->errors()->first();
            //return redirect()->back()->withErrors($validate)->withInput($request->all());
        //}

        $file_name = $this->saveImage($request->photo, 'images/offers');

        //another save photo in the folder
//        $file_extension = $request->photo->getClientOriginalExtension();
//        $file_name = time().$file_extension;
//        $path = 'images/offers';
//        $file_name = time().'.'.$file_extension;
//        $request->photo->move($path, $file_name);



        //insert
        Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,


        ]);
        return redirect()->back()->with(['success' => 'messages.success']);

    }
// Move to File OfferTriat *******

//    protected function saveImage($photo,$folder) {
//        $file_extension = $photo->getClientOriginalExtension();
//        $path = $folder;
//        $file_name = time().'.'.$file_extension;
//        $photo->move($path, $file_name);
//        return $file_name;
//
//    }


//***********Move to OfferRequest ****************

//    protected function getRules(): array
//    {
//        return $rules = [
//            'name' => 'required|max:100|unique:offers,name',
//            'price' => 'required|numeric',
//            'details' => 'required',
//        ];
//    }
//
//    protected function getMessages(): array
//    {
//        return $massages = [
//            'name.required' => __('messages.offersName required'),
//            'name.unique' => __('messages.offersName must be  unique'),
//            'price.required' => __('messages.offersPrice required'),
//            'price.numeric' => __('messages.offersPrice must be numeric'),
//           'details.required' => __('messages.offersDetails'),
//        ];
//    }

        public function getAllOffers() {
             $viewOffer  = Offer::Select('id',
                 'name_'. LaravelLocalization::getCurrentLocale().' as name',
                 'details_'. LaravelLocalization::getCurrentLocale().' as details',

                 'price', 'details_ar')->get();

        return view('offers.all', compact('viewOffer'));

        }

        public function editOffer($offer_id){

        //Offer::findOrFail($offer_id);

           $offer_Search = Offer::find($offer_id);
           if(!$offer_Search)
           return redirect()->back();
         $offer_select = Offer::Select('id','name_ar', 'name_en', 'price', 'details_ar', 'details_en')->find($offer_id);
         return view('offers.edite',compact('offer_select'));


        }

        public function updateOffer(OfferRequest $request, $offer_id){
        //validation request in the offerRequest

        //check is offer exists
            $offer_Search = Offer::find($offer_id);
            if(!$offer_Search)
                return redirect()->back();

       // update data
            $offer_Search -> update($request -> all());
//            return redirect()->back()->with(['success_update'=>'messages.success_update']);

            return redirect()->route('offers.all');

            //Another way

            /* $offer_Search -> update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'price' => $request->price,
            ]); */

        }



}
