<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Traits;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Events\VideoViewer;
use resources\views;
use Dotenv\Validator;
use App\Models\User;
use App\Models\Video;
use App\Traits\OfferTrait;
use Illuminate\Console\Command;



class offerController extends Controller
{
    public function create(){
// فورم لحفظ العروض
return view(view: 'ajaxoffers.offer');
    }


    public function store   (Request $request){
//حفظ العروض في قاعدة البيانات باستخدام آجاكس(AJAX)
        $file_name = $this -> saveImage($request -> photo ,'file_photo\offers_photo');
       $offer = Offer::create([

            'name_ar' => $request-> name_ar ,
            'name_en' => $request-> name_en ,
            'price' => $request-> price,
            'details_ar' => $request-> details_ar,
            'details_en' => $request-> details_en,
           'photo' => $file_name,

        ]);

        if($offer)
        return response()->json([
            'status'=>true,
            'message'=>'save done successfully'
        ]);
        else
            return response()->json([
                'status'=>false,
                'message'=>'save didn’t done successfully'
            ]);


        //return redirect()->back()->with(['success'=>'The offer has been successfully added']);

            }

            //////////////////////////////////////////////////////////////
            public function ajaxShow(){

                $offers = Offer::select('id',//'name_ar','name_en',
                'name_'.LaravelLocalization::getCurrentLocale() . ' as Name2',
                'price',
                'details_'.LaravelLocalization::getCurrentLocale() . ' as Details2',
                'photo',
                ) ->get();


                return view(view: 'ajaxoffers.welcome3ajax')->with(compact('offers'));


            }

            //////////////////////////////////////////////////////////////
            public function deleteAjax(Request $request){

                $offer = Offer::find($request -> id);

                if(!$offer){
                return redirect() -> back() -> with(['error' =>  __(key:'messages.offer_not_exist')] );
                }

                $offer -> delete();

                return response()->json([
                    'status'=>true,
                    'message'=>'save done successfully',
                    'id' => $request -> id,
                ]);

            }

            //////////////////////////////////////////////////////////////
public function deleteoffer($offer_id){

    $offer = Offer::find($offer_id);

    if(!$offer){
    return redirect() -> back() -> with(['error' =>  __(key:'messages.offer_not_exist')] );
    }

    $offer -> delete();

    return redirect()
    -> route('offer_all',$offer_id)
    -> with(['success' =>  __(key:'messages.delete_Data_success')]);

}
}
