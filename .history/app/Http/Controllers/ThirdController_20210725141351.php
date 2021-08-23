<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use resources\views;
use App\Models\Offer;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ThirdController extends Controller
{
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




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function offer_view()
    {

        return view(view: 'offers.header');

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

        Offer::create([

            'name' => $request-> name ,
            'price' => $request-> price,
            'details' => $request-> details,

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



}
