<?php

namespace App\Http\Controllers\NewControllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers;


class FirstController extends Controller
{
    public function ShowString (){

        return 'مثال على الكنترولر';


    }

}
