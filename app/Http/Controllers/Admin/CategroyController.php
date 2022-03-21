<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategroyController extends Controller
{
    public function index()
    {

        $categories = DB::table('categories')->get();

        return view('admin.categories.index', ['categories' => $categories]);

    }


    public function create()
    {
        $categories = DB::table('categories')->where('status', '=', 1)->get();
        return view('admin.categories.create', ['categories' => $categories]);
    }


    public function edit($id)
    {
        $category = DB::table('categories')->where('id', '=', $id)->first();
        $categories = DB::table('categories')->where('status', '=', 1)->get();
        return view('admin.categories.edit', ['categories' => $categories, 'category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = $request->post();
        unset($category['_token']);
        $categoryArray = [
            'title' => $category['title'],
            'en_title' => $category['en_title'],
            'ru_title' => $category['ru_title'],
            'ar_title' => $category['ar_title'],
            'de_title' => $category['de_title'],
            'slug' => $category['slug'],

        ];
        if (isset($category['status'])){
            $categoryArray['status'] = 1;

        }else{
            $categoryArray['status'] = 0;

        }
        if ($category['parent_id'] != null) {
            $categoryArray['parent_id'] =  $category['parent_id'];

        }
        $category_img = $request->file('img_url');
        if ($category_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'categories', 'category');
            if ($uploadImage) {
                $image = DB::table('categories')->where('id','=',$id)->first();
                @unlink('web/categories/'.$image->img_url);
                $categoryArray['img_url'] = $uploadImage;

            } else {

                return redirect()->route('admin.categories.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');

            }
        }
        $updateCategory = DB::table('categories')->where('id','=',$id)->update($categoryArray);
        if ($updateCategory) {
            return redirect()->route('admin.categories.index')->with('success', 'Başarıyla Kaydedildi');
        } else {

            return redirect()->route('admin.categories.index')->with('error', 'Kaydedilirken Bir Hata Oluştu');

        }
    }

    public function store(Request $request)
    {
        $category = $request->post();
        unset($category['_token']);
        $categoryArray = [
            'title' => $category['title'],
            'en_title' => $category['en_title'],
            'ru_title' => $category['ru_title'],
            'ar_title' => $category['ar_title'],
            'de_title' => $category['de_title'],
            'slug' => $category['slug'],
        ];
        if (isset($category['status'])){
            $categoryArray['status'] = $category['status'];

        }else{
            $categoryArray['status'] = 0;

        }

            $categoryArray['parent_id'] =  $category['parent_id'];

        $category_img = $request->file('img_url');
        if ($category_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'categories', 'category');
            if ($uploadImage) {

                $categoryArray['img_url'] = $uploadImage;

            } else {

                return redirect()->route('admin.categories.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');

            }
        }
        $saveCategory = DB::table('categories')->insert($categoryArray);
        if ($saveCategory) {
            return redirect()->route('admin.categories.index')->with('success', 'Başarıyla Kaydedildi');
        } else {

            return redirect()->route('admin.categories.index')->with('error', 'Kaydedilirken Bir Hata Oluştu');

        }


    }
    public function destroy(Request $request){
        $id = $request->post('id');
        $category_img = DB::table('categories')->where('id','=',$id)->first();
        @unlink('web/categories/'.$category_img->img_url);
        $deleteCategory = DB::table('categories')->delete($id);
        if ($deleteCategory){
            return $id;

        }
    }

    public function statusUpdate(Request $request){
        $id = $request->post('id');
        $category = DB::table('categories')->where('id','=',$id)->first();
         if ($category->status == 0){
             $status = 1;
         }else{
             $status = 0;
         }


        $status_update = DB::table('categories')->where('id','=',$id)->update([
            'status' => $status
        ]);
        if ($status_update){
            return true;
        }else{
            return false;
        }

    }
}
