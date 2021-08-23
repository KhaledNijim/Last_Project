<?php

namespace App\Http\Controllers\NewControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class FirstController extends Controller
{

    public function __construct (){

        this -> middleware(middleware:'auth')->except(methods: ['ShowString2','ShowString3'] );


    }
    
    public function ShowString (){

        return '1مثال على الكنترولر';


    }
    public function ShowString1 (){

        return '11مثال على الكنترولر';


    }

    public function ShowString2 (){

        return '222مثال على الكنترولر';


    }

    public function ShowString3 (){

        return '3333مثال على الكنترولر';


    }

}
