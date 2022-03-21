<?php

namespace App\Http\Controllers\Admin;

use App\Business\Translate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TranslateController extends Controller
{

   public function action(Request $request){
    $lang = $request->post('lang');
    $text = $request->post('text');
    return Translate::set('tr',$lang,$text)->get();
   }
}
