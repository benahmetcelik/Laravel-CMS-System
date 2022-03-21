<?php

namespace App\Http\Controllers\Web;

use App\Business\ActiveTheme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Business\PostCutter;


class BlogController extends Controller
{
    public function author()
    {

    }

    public function index()
    {
        $authors = DB::table('users')->first();

        $posts = DB::table('posts')

            ->join('users', 'users.id', '=', 'posts.author_id')
            ->join('categories','categories.id','=','posts.category_id')
            ->paginate(15,[
                'posts.created_at as post_created',
                'posts.id as post_id',
                'categories.title as category_title',
                'categories.slug as category_slug',
                'posts.img_url as post_img',
                'users.img_url as profile_img',
                'posts.*',
                'users.*']);


        $site_settings=DB::table('site_settings')->first();
        //$posts['created_at'] = DB::table('posts')->where('status','=',1)->get('created_at');
        // print_r($posts);
        if ($posts) {

            return view('web.'.ActiveTheme::active_dir().'.blog.index', ['posts' => $posts,'site_settings'=>$site_settings,'author'=>$authors]);

        } else {
            return view('web.errors.404');

        }


    }

    public function search(Request $request){

        $keys = $request->post('keys');

        $authors = DB::table('users')->first();

        $posts = DB::table('posts')
                ->where('posts.title','LIKE','%'.$keys.'%')
            ->orWhere('posts.content','LIKE','%'.$keys.'%')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->join('categories','categories.id','=','posts.category_id')
            ->paginate(15,[
                'posts.created_at as post_created',
                'posts.id as post_id',
                'categories.title as category_title',
                'categories.slug as category_slug',
                'posts.img_url as post_img',
                'users.img_url as profile_img',
                'posts.*',
                'users.*']);


        $site_settings=DB::table('site_settings')->first();
        //$posts['created_at'] = DB::table('posts')->where('status','=',1)->get('created_at');
        // print_r($posts);
        if ($posts) {

            return view('web.'.ActiveTheme::active_dir().'.blog.index', ['posts' => $posts,'site_settings'=>$site_settings,'author'=>$authors]);

        } else {
            return view('web.errors.404');

        }
    }

    public function category($uri){
        $authors = DB::table('users')->first();

        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->join('categories','categories.id','=','posts.category_id')
            ->where('categories','=',$uri)
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
        //$posts['created_at'] = DB::table('posts')->where('status','=',1)->get('created_at');
        // print_r($posts);
        if ($posts) {

            return view('web.blog.index', ['posts' => $posts,'site_settings'=>$site_settings,'author'=>$authors]);

        } else {
            return view('web.errors.404');

        }
    }


    public function show($uri)
    {
        //$post = DB::table('posts')->where('slug', '=', $uri)->first();
        $authors = DB::table('users')->first();

        $post = DB::table('posts')
            ->where('status', '=', 1)
            ->where('slug', '=', $uri)
            ->leftJoin('users', 'users.id', '=', 'posts.author_id')
            ->first(['posts.created_at as post_created', 'posts.id as post_id','posts.img_url as post_img','users.img_url as profile_img','posts.*', 'users.*']);
        $site_settings=DB::table('site_settings')->first();

        if ($post) {
            return view('web.'.ActiveTheme::active_dir().'.blog.show', ['post' => $post,'site_settings'=>$site_settings,'author'=>$authors]);

        } else {
            return view('web.errors.404');
        }
    }
}
