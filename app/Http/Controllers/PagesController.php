<?php

namespace App\Http\Controllers;

use App\Example;

class PagesController extends Controller
{
    public function home(/*Example $example*/){
        /*ddd($example);*/

        //if we use singleton() instead of bind() in AppServiceProvider->register() , we get same objects
        ddd(resolve('App\Example'),resolve('App\Example'),resolve('App\Example'));
    }
}
