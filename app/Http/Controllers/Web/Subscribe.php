<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Subscribe extends Controller
{
        public function add(Request $request){

            $email = $request->post();
            unset($email['_token']);
            $add_subscribe = DB::table('subscribes')->insert([
                'email'=>$email['email'],
                'status'=>1,
                'created_at' =>new \DateTime(),
                'updated_at' =>new \DateTime()
            ]);
            if ($add_subscribe){
                return true;
            }else{
                return false;
            }
        }
}
