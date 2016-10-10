<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PracticeController extends Controller
{

    public function example2() {
        // note backslash in from of Rych/Random
        // this is needed to get to global namespace
        // otherwise, Laravel will look in Controller namespace and throw an error
        // other fixes: https://github.com/susanBuck/dwa15-fall2016-notes/blob/master/03_Laravel/14_Composer_Packages.md#which-option-is-best
        $random = new \Rych\Random\Random();
        return $random->getRandomString(8);
    }

    public function example1() {
        echo 'App debug: '.config('app.debug');
    }

    // on index, list all examples
    public function index() {
        $actionsMethods = get_class_methods($this);
        foreach($actionsMethods as $actionMethod) {
            if(strstr($actionMethod, 'example')) {
                echo '<a target="_blank" href="/practice/'.str_replace('example','',$actionMethod).'">'.$actionMethod.'</a>';
            }
        }
    }
}
