<?php

namespace App\Http\Controllers;


use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use resources\views;
use App\Models\Offer;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Traits\OfferTrait;
use Illuminate\Console\Command;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ThirdController extends Controller
{

    use OfferTrait;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view(view: 'offers.offer');

/*
      Offer::create([

            'name' => 'offer4',
            'price' => '199',
            'details' => 'It is good offer for you',


        ]);
        return  Offer:: get();
*/




    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $var1 = 1;

        $offers = Offer::select('*') ->get();

        foreach($offers as $var){

           $var12 =  "offer"."$var1" ;
            $var ->update(['name' => $var12]);

            $var1 += 1;
        }


        $offers = Offer::select('id',//'name_ar','name_en',
        'name_'.LaravelLocalization::getCurrentLocale() . ' as Name2',
        'price',
        'details_'.LaravelLocalization::getCurrentLocale() . ' as Details2',
        'photo',
        ) ->get();


        return view(view: 'welcome3')->with(compact('offers'));


       // return view(view: 'welcome3',compact('offers'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {

        Offer::create([

            'name_ar' => $request-> name_ar ,
            'name_en' => $request-> name_en ,
            'price' => $request-> price,
            'details_ar' => $request-> details_ar,
            'details_en' => $request-> details_en,

        ]);

        return redirect()->back()->with(['success'=>'The offer has been successfully added']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         // 1مثال
       // return view(view: 'welcome2')->with ('VarebleName', 'البيانات التي تريد إرسالها إما من قاعدة البيانات أم تريد إدخالها');

      //مثال 2

      $data = [];
       $data['name']='KhaledNijim';
       $data['age']='25';
       return view(view: 'welcome2')-> with ($data);


      // مثال3
      /*
      @obj = new \stdClass();

        @obj ->name ='KhaledNijim';
        @obj ->id ='411053325';
        @obj ->gender ='male';
        return view(view: 'welcome', compact (varname: 'obj'));
       */

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //////////////////////////////////////////////////////

    public function offer_create()
    {

        return view(view: 'offers.offer');

    }



    public function offer_post(OfferRequest $request)
    {

       /* $rules =         [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];*/




        // $message = $this -> getMessage();

       /* $validator = Validator($request->all(),$rules,$message);

        if($validator -> fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());

          //  return $validator -> errors(); //-> first()
        }*/



        $file_name = $this -> saveImage($request -> photo ,'file_photo\offers_photo');

        Offer::create([

            'name_ar' => $request-> name_ar ,
            'name_en' => $request-> name_en ,
            'price' => $request-> price,
            'details_ar' => $request-> details_ar,
            'details_en' => $request-> details_en,
            'photo' => $file_name,

        ]);

        return redirect()->back()->with(['success'=>'The offer has been successfully added']);

      //  return 'Save offer successfuly';

       // return $request;

    }


   /*
        return
        /* $message = ['name.unique' => 'offer name required',
                     'price.numeric' => 'enter number'
        ];*/

      /*  $message = [
                     'name.unique' => __(key:'messages.offer name required'),
                     'price.numeric' =>trans(key:'messages.enter number'),
         ];


    }*/



/////////////////////////////////////////////////////////////////

public function editoffer($offer_id)
{

    $offer = Offer::find($offer_id);

    if(!$offer){
    return redirect()->  back();
    }

$offers2 = Offer::select('id','name_ar','name_en','price','details_ar','details_en','photo') -> find($offer_id);

return view (view: 'offers.updateOffer2')-> with(compact('offers2'));

}


/////////////////////////////////////////////////////////////////

public function updateoffer(OfferRequest $request,$offer_id)
{


    $offer = Offer::find($offer_id);

    if(!$offer){
    return redirect()->  back();
    }
$offer -> update($request -> all());

/*$offer -> update([

    'name_ar' => $request -> name_ar,

]);*/

return redirect() -> back() -> with(['success' =>  __(key:'messages.update_Data_success') ]);

}

//////////////////////////////////////////////////////////////
public function deleteoffer($offer_id){

    $offer = Offer::find($offer_id);

    if(!$offer){
    return redirect() -> back() -> with(['error' =>  __(key:'messages.offer_not_exist')] );
    }

    $offer -> delete();

    return redirect() -> route(route: 'offer_delete') -> with(['success' =>  __(key:'messages.delete_Data_success'), $offer_id]);

}

////////////////////////////////////////////////////////

public function getvideo(){

    $video = Video::first();

    event(new VideoViewer($video));

    return view(view: 'video')-> with('video', $video);
}

}
