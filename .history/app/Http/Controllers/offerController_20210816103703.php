<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class offerController extends Controller
{
    public function create(){
// فورم لحفظ العروض

return view(view: 'ajaxoffers.offer');
    }


    public function store(OfferRequest $request){
//حفظ العروض في قاعدة البيانات باستخدام آجاكس(AJAX)


    }
}
