<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){

        $posts = DB::table('posts')->get();

        $categories = DB::table('categories')->get();
        return view('admin.posts.index',['posts'=>$posts,'categories'=>$categories]);
    }

    public function create(){
        $categories = DB::table('categories')->where('status','=',1)->get();
        if (0 < count($categories)){
            return view('admin.posts.create',['categories'=>$categories]);

        }else{
            return redirect()->route('admin.categories.create');

        }
    }

    public function store(Request $request){
        $author_id = Auth::id();
        $post_content = $request->post();
        $post_content['author_id']=$author_id;
        $post_content['status']=1;
        $post_content['total_view']=1;
        $post_content['created_at']=date("Y-m-d H:i:s", strtotime('now'));
        $post_content['updated_at']=date("Y-m-d H:i:s", strtotime('now'));
        $post_img = $request->file('img_url');
        if ($post_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'posts', 'posts');
            if ($uploadImage) {

                $post_content['img_url'] = $uploadImage;

            } else {

                return redirect()->route('admin.posts.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');

            }
        }
        unset($post_content['_token']);
        $savePost = DB::table('posts')->insert($post_content);
        $post_id = DB::getPDO()->lastInsertId();
        $post_category = [
            'post_id' =>$post_id,
            'category_id'=>$post_content['category_id']
        ];
        $savePostCategory = DB::table('post_categories')->insert($post_category);
        if ($savePost){
            return redirect()->route('admin.posts.index');
        }
    }

    public function statusUpdate(Request $request){
        $id = $request->post('id');
        $category = DB::table('posts')->where('id','=',$id)->first();
        if ($category->status == 0){
            $status = 1;
        }else{
            $status = 0;
        }


        $status_update = DB::table('posts')->where('id','=',$id)->update([
            'status' => $status
        ]);
        if ($status_update){
            return true;
        }else{
            return false;
        }

    }

    public function destroy(Request $request){
        $id= $request->post('id');
        $post_img = DB::table('posts')->where('id','=',$id)->first();
        @unlink('web/posts/'.$post_img->img_url);
        $deletePost= DB::table('posts')->delete($id);
        if ($deletePost){
            return $id;
        }else{
            return 0;
        }
    }

    public function edit($id){

        $post = DB::table('posts')->where('id','=',$id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.posts.edit',['post'=>$post,'categories'=>$categories]);

    }

    public function update(Request $request,$id){
        $post=DB::table('posts')->where('id','=',$id)->first();
        $author_id = Auth::id();
        $post_content = $request->post();
        $post_content['author_id']=$author_id;
        $post_content['updated_at']=date("Y-m-d H:i:s", strtotime('now'));
        $post_img = $request->file('img_url');
        if ($post_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'posts', 'posts');
            if ($uploadImage) {
                @unlink('web/posts/'.$post->img_url);
                $post_content['img_url'] = $uploadImage;

            } else {

                return redirect()->route('admin.posts.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');

            }
        }
        unset($post_content['_token']);
        $savePost = DB::table('posts')
            ->where('id','=',$id)
            ->update($post_content);
        $post_category = [
            'post_id' =>$id,
            'category_id'=>$post_content['category_id']
        ];
       // $post_category_table=DB::table('post_categories')->where('post_id','=',$id)->first();

        $updatePostCategory = DB::table('post_categories')->where('id','=',$id)->update($post_category);
        if ($savePost){
            return redirect()->route('admin.posts.index');
        }
    }

}
