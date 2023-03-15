<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTriat;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class offerController extends Controller
{
    use OfferTriat;

    //viwe from to add this offer
    public function create()
    {
        return view('ajaxoffers.create');

    }

    //save offer into DB using AJAX
    public function store(OfferRequest $request)
    {

        $file_name = $this->saveImage($request->photo, 'images/offers');


        //insert table offers in database
        $offer = Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,

        ]);

        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',

            ]);

        } else {
            return response()->json([
                'status' => false,
                'msg' => 'لم يتم الحفظ',

            ]);
        }

    }

    public function all()
    {
        $viewOffer = Offer::Select('id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',

            'price', 'photo', 'details_ar')->limit(10)->get();

        return view('ajaxoffers.all', compact('viewOffer'));
    }

    public function delete(Request $request)
    {
        $offer = Offer::find($request->id);

        if ($offer) {

            $offer->delete();

            return response()->json([
                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request->id,

            ]);
        }

    }

    public function edit(Request $request)
    {

        //Offer::findOrFail($offer_id);

        $offer_Search = Offer::find($request->offer_id);
        if (!$offer_Search) {

            return response()->json([
                'status' => false,
                'msg' => 'العرض غير موجود',
            ]);

        }
        $offer_select = Offer::Select('id', 'name_ar', 'name_en', 'price', 'details_ar', 'details_en')->find($request->offer_id);

        return view('ajaxoffers.edit', compact('offer_select'));

    }

    public function update(Request $request)
    {

        //check is offer exists
        $offer_Search = Offer::find($request->offer_id);
        if (!$offer_Search)
            return response()->json([
                'status' => false,
                'msg' => 'العرض غير موجود',
            ]);

        // update data
        $offer_Search->update($request->all());
        return response()->json([
            'status' => true,
            'msg' => 'تم التحديث بنجاح',

        ]);



    }

}
