<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Testimonials\TestimonialsRequest;

class TestimonialsController extends Controller
{

    public function index()
    {
        $testimonials = DB::table("testimonials")->get();
        return view("admin.testimonials.index",['testimonials'=>$testimonials]);
    }

    public function create()
    {
        return view("admin.testimonials.create");
    }


    public function store(Request $request)
    {
      // $request->validated();
      $testimonial = $request->post();
      unset($testimonial['_token']);
        $testimonial['created_at']=date("Y-m-d H:i:s", strtotime('now'));
        $testimonial['updated_at']=date("Y-m-d H:i:s", strtotime('now'));
        $testimonial_img = $request->file('img_url');
        if ($testimonial_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'testimonials', 'testimonial');
            if ($uploadImage) {
                $testimonial['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.testimonials.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        $insert = DB::table("testimonials")->insert($testimonial);
        if ($insert){
            return  redirect()->route("admin.testimonials.index");

        }
    }



    public function statusUpdate(Request $request){

        $id = $request->post('id');
        $sliders = DB::table('testimonials')->where('id','=',$id)->first();
        if ($sliders->status == 0){
            $status = 1;

        }else{
            $status = 0;
        }


        $status_update = DB::table('testimonials')->where('id','=',$id)->update([
            'status' => $status
        ]);
        if ($status_update){
            return true;
        }else{
            return false;
        }

    }



    public function edit($id)
    {
        $testimonial = DB::table("testimonials")->where('id',"=",$id)->first();
        return  view("admin.testimonials.edit",['testimonial'=>$testimonial]);
    }


    public function update(Request $request, $id)
    {
        $testimonials = $request->post();
        unset($testimonials['_token']);
        $testimonials_img = $request->file('img_url');
        if ($testimonials_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'testimonials', 'testimonial');
            if ($uploadImage) {
                $testimonials['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.testimonials.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }else{
            unset($testimonials['img_url']);
        }
        $testimonials_update = DB::table('testimonials')->where('id','=',$id)->update($testimonials);
        if ($testimonials_update){
            return redirect()->route('admin.testimonials.index')->with('success', 'Güncelleme Başarılı');

        }else{
            return redirect()->route('admin.testimonials.index')->with('error', 'Güncellenirken Bir Hata Oluştu');

        }


    }


    public function destroy($id)
    {
        $delete = DB::table("testimonials")->where('id',"=",$id)->delete();
        if ($delete){
            return redirect()->route("admin.testimonials.index");

        }else{
            return redirect()->route("admin.testimonials.index")->with('error','Silme İşlemi Başarısız Oldu');

        }
    }

}
