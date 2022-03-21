<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FaqsController extends Controller
{
    public function index()
    {
        $faqs = DB::table("faqs")->get();
        return  view("admin.faqs.index",['faqs'=>$faqs]);
    }


    public function create()
    {
        return view("admin.faqs.create");
    }

    public function store(Request $request)
    {
       // $request->validated();
        $faq = $request->post();
        unset($faq['_token']);
        $insert = DB::table("faqs")->insert($faq);
        if ($insert)
            return  redirect()->route("admin.faqs.index");
    }


    public function edit($id)
    {
        $faq = DB::table("faqs")->where('id',"=",$id)->first();
        return view("admin.faqs.edit",['faq'=>$faq]);
    }


    public function update(Request $request, $id)
    {
        // $request->validated();
        $faq = $request->post();
        unset($faq['_token']);
        $update = DB::table("faqs")->where('id','=',$id)->update($faq);
        return  redirect()->route("admin.faqs.index");
    }

    public function destroy($id)
    {
        $delete = DB::table("faqs")->where('id','=',$id)->delete();
        if ($delete)
            return  redirect()->route("admin.faqs.index");
    }

    public function statusUpdate(Request $request){
        $id = $request->post('id');
        $gallery = DB::table('faqs')->where('id','=',$id)->first();
        if ($gallery->status == 0){
            $status = 1;
        }else{
            $status = 0;
        }


        $status_update = DB::table('faqs')->where('id','=',$id)->update([
            'status' => $status
        ]);
        if ($status_update){
            return true;
        }else{
            return false;
        }
    }
}
