<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Traits;

class offerController extends Controller
{
    public function create(){
// فورم لحفظ العروض
return view(view: 'ajaxoffers.offer');
    }


    public function store   (OfferRequest $request){
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

            public function ajaxdelete(){




            }
}
