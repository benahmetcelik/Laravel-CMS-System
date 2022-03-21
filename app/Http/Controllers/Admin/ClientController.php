<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(){
        $clients = DB::table('clients')->get();
        return view('admin.clients.index',['clients'=>$clients]);
    }

    public function create(){
        return view('admin.clients.create');
    }

    public function edit($id){



        $gallery = DB::table('clients')->where('id','=',$id)->first();
        if ($gallery){
            return view('admin.clients.edit',['gallery'=>$gallery]);
        }else{
            return view('admin.clients.create');
        }

    }

    public function store(Request $request){

        $gallery = $request->post();
        unset($gallery['_token']);
        $gallery['created_at']=date("Y-m-d H:i:s", strtotime('now'));
        $gallery['updated_at']=date("Y-m-d H:i:s", strtotime('now'));
        $gallery_img = $request->file('img_url');
        if ($gallery_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'clients', 'client');
            if ($uploadImage) {
                $gallery['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.clients.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        $saveGallery = DB::table('clients')->insert($gallery);
        if ($saveGallery){
            return redirect()->route('admin.clients.index');
        }
    }

    public function statusUpdate(Request $request){

        $id = $request->post('id');
        $gallery = DB::table('clients')->where('id','=',$id)->first();
        if ($gallery->status == 0){
            $status = 1;
        }else{
            $status = 0;
        }


        $status_update = DB::table('clients')->where('id','=',$id)->update([
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
            $uploadImage = ImageUploader::upload($request, 'img_url', 'clients', 'client');
            if ($uploadImage) {
                $gallery['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.clients.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }else{
            unset($gallery['img_url']);
        }
        $gallery_update = DB::table('clients')->where('id','=',$id)->update($gallery);
        if ($gallery_update){
            return redirect()->route('admin.clients.index')->with('success', 'Güncelleme Başarılı');

        }else{
            return redirect()->route('admin.clients.index')->with('error', 'Güncellenirken Bir Hata Oluştu');

        }
    }


}
