<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    public function home(/*Example $example*/ Filesystem $file){
        /*ddd($example);*/

        //if we use singleton() instead of bind() in AppServiceProvider->register() , we get same objects
/*        ddd(resolve('App\Example'),resolve('App\Example'),resolve('App\Example'));*/




        /*return File::get(public_path('index.php'));*/

        #it's the same

        return $file->get(public_path('index.php'));

        /*Cache::remember('foo', 60, fn() => 'Something' );
        return Cache::get('foo');*/

    }
}
