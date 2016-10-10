<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PracticeController extends Controller
{

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
