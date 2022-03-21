<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index()
    {
        //$user_id = Auth::id();
        // ->where('author_id','=',$user_id)
        $sliders = DB::table('sliders')
            ->get();

        return view('admin.slider.index', ['sliders' => $sliders]);
    }


    public function create(){
        return view('admin.slider.create');
    }


    public function edit($id){

       // echo 'ajbkjabfskjfas'.$id;

        $slider = DB::table('sliders')->where('id','=',$id)->first();
        if ($slider){
            return view('admin.slider.edit',['slider'=>$slider]);
        }else{
            return view('admin.slider.create');
        }

    }
    public function store(Request $request){

        $slider = $request->post();
        unset($slider['_token']);
        $slider['created_at']=date("Y-m-d H:i:s", strtotime('now'));
        $slider['updated_at']=date("Y-m-d H:i:s", strtotime('now'));
        $slider_img = $request->file('img_url');
        if ($slider_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'sliders', 'slider');
            if ($uploadImage) {
                $slider['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.slider.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        $saveSlider = DB::table('sliders')->insert($slider);
        if ($saveSlider){
            return redirect()->route('admin.slider.index');
        }
    }

    public function statusUpdate(Request $request){

        $id = $request->post('id');
        $sliders = DB::table('sliders')->where('id','=',$id)->first();
        if ($sliders->status == 0){
            $status = 1;
        }else{
            $status = 0;
        }


        $status_update = DB::table('sliders')->where('id','=',$id)->update([
            'status' => $status
        ]);
        if ($status_update){
            return true;
        }else{
            return false;
        }

    }

    public function update(Request $request,$id){
        $slider = $request->post();
        unset($slider['_token']);
        $slider_img = $request->file('img_url');
        if ($slider_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'sliders', 'slider');
            if ($uploadImage) {
                $slider['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.slider.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }else{
            unset($slider['img_url']);
        }
        $slider_update = DB::table('sliders')->where('id','=',$id)->update($slider);
        if ($slider_update){
            return redirect()->route('admin.slider.index')->with('success', 'Güncelleme Başarılı');

        }else{
            return redirect()->route('admin.slider.index')->with('error', 'Güncellenirken Bir Hata Oluştu');

        }
    }


}
