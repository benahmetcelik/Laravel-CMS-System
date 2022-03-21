<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index(){
        $services = DB::table('services')->get();
        return view('admin.services.index',['services'=>$services]);
    }

    public function create(){
        return view('admin.services.create');
    }

    public function edit($id){



        $gallery = DB::table('services')->where('id','=',$id)->first();
        if ($gallery){
            return view('admin.services.edit',['gallery'=>$gallery]);
        }else{
            return view('admin.services.create');
        }

    }

    public function store(Request $request){

        $service = $request->post();
        unset($service['_token']);
        $service['created_at']=date("Y-m-d H:i:s", strtotime('now'));
        $service['updated_at']=date("Y-m-d H:i:s", strtotime('now'));
        $service_img = $request->file('img_url');
        if ($service_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'services', 'service');
            if ($uploadImage) {
                $service['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.service.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        $saveService = DB::table('services')->insert($service);
        if ($saveService){
            return redirect()->route('admin.service.index');
        }
    }

    public function statusUpdate(Request $request){

        $id = $request->post('id');
        $gallery = DB::table('services')->where('id','=',$id)->first();
        if ($gallery->status == 0){
            $status = 1;
        }else{
            $status = 0;
        }


        $status_update = DB::table('services')->where('id','=',$id)->update([
            'status' => $status
        ]);
        if ($status_update){
            return true;
        }else{
            return false;
        }

    }

    public function update(Request $request,$id){
        $gallery = $request->post();
        unset($gallery['_token']);
        $gallery_img = $request->file('img_url');
        if ($gallery_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'services', 'service');
            if ($uploadImage) {
                $gallery['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.service.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }else{
            unset($gallery['img_url']);
        }
        $gallery_update = DB::table('services')->where('id','=',$id)->update($gallery);
        if ($gallery_update){
            return redirect()->route('admin.service.index')->with('success', 'Güncelleme Başarılı');

        }else{
            return redirect()->route('admin.service.index')->with('error', 'Güncellenirken Bir Hata Oluştu');

        }
    }
}
