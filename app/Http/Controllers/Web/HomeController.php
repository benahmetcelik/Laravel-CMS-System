<?php

namespace App\Http\Controllers\Web;

use App\Business\ActiveTheme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $posts = DB::table('posts')

            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->get([
                'posts.created_at as post_created',
                'posts.id as post_id',
                'posts.img_url as post_img',

                'posts.*',

                'categories.title as category_title',
                'categories.slug as category_slug'
            ]);
        if ($posts) {
            $result['posts'] = $posts;
        }
        $site_settings = DB::table('site_settings')->first();
        if ($site_settings) {
            $result['site_settings'] = $site_settings;
        }

        $authors = DB::table('users')->first();
        if ($authors) {
            $result['author'] = $authors;
        }

        $sliders = DB::table('sliders')->where('status', '=', 1)->get();
        if ($sliders) {
            $result['sliders'] = $sliders;
        }

        $services = DB::table('services')->where('status', '=', 1)->get();
        if ($services) {
            $result['services'] = $services;
        }

        $galleries = DB::table('galleries')->where('status', '=', 1)->get();
        if ($galleries) {
            $result['galleries'] = $galleries;
        }

        $clients = DB::table('clients')->where('status', '=', 1)->get();
        if ($clients) {
            $result['clients'] = $clients;
        }

        $testimonials = DB::table('testimonials')->where('status', '=', 1)->get();
        if ($testimonials) {
            $result['testimonials'] = $testimonials;
        }

        //print_r($posts);
        return view('web.' . ActiveTheme::active_dir() . '.index', $result);
    }
}
