<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
  // single action controller
  // uses one method: __invoke()
  public function __invoke() {
        return 'This page should display contact information';
  }
}