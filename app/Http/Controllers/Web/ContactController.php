<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{


    public function store(Request $request){
        $contact = $request->post();
        unset($contact['_token']);
        $contact['status']=1;
        $contactSave = DB::table('contacts')->insert($contact);
        if ($contactSave){
           return true;

        }else{
            return false;

        }
    }


}
