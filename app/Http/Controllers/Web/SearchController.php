<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        $params = $request->get('key');
        if ($params != null){

           // $posts= DB::table('posts')->where('title','LIKE','%'.$params.'%');
            $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.author_id')
                ->join('categories','categories.id','=','posts.category_id')
                ->where('posts.title','LIKE','%'.$params.'%')
                ->orWhere('posts.content','LIKE','%'.$params.'%')
                ->get([
                    'posts.created_at as post_created',
                    'posts.id as post_id',
                    'categories.title as category_title',
                    'categories.slug as category_slug',
                    'posts.img_url as post_img',
                    'users.img_url as profile_img',
                    'posts.*',
                    'users.*']);

            $other_posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.author_id')
                ->join('categories','categories.id','=','posts.category_id')
                ->get([
                    'posts.created_at as post_created',
                    'posts.id as post_id',
                    'categories.title as category_title',
                    'categories.slug as category_slug',
                    'posts.img_url as post_img',
                    'users.img_url as profile_img',
                    'posts.*',
                    'users.*']);
            $site_settings=DB::table('site_settings')->first();
            $authors = DB::table('users')->first();

            if (empty($posts)){
                return view('web.errors.404');

            }else{
                return view('web.blog.index',['posts'=>$posts,'post'=>$other_posts,'site_settings'=>$site_settings,'author'=>$authors])->with('searchForResults',$params.' İçin Arama Sonuçları :');

            }

        }else{
            return view('web.errors.404');
        }
    }
}
