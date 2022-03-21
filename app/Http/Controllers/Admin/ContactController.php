<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        $contacts = DB::table('contacts')->get();
        return view('admin.contacts.index',['contacts'=>$contacts]);
    }

    public function show($id){
        $contacts = DB::table('contacts')->where('id','=',$id)->first();
        return view('admin.contacts.show',['contact'=>$contacts]);
    }

    public function destroy($id){
        $contacts = DB::table('contacts')->delete($id);
        if ($contacts){
            return redirect()->route('admin.contact.index')->with('success','Başarıyla silindi');
        }else{
            return redirect()->route('admin.contact.index')->with('error','Silinemedi');

        }

    }


}
