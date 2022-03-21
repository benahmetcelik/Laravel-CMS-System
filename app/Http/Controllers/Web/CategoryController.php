<?php

namespace App\Http\Controllers\Web;

use App\Business\ActiveTheme;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function search($category)
    {
        if (get_category_id($category) > 0) {
            $id = get_category_id($category);
            $posts = DB::table('posts')
                ->where('category_id', '=', $id, 'and', 'status', '=', 1)
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->paginate(15, [
                    'posts.created_at as post_created',
                    'posts.id as post_id',
                    'categories.title as category_title',
                    'categories.slug as category_slug',
                    'posts.img_url as post_img',
                    'posts.*']);
            $site_settings = DB::table('site_settings')->first();
            if ($posts) {
                return view('web.'.active_theme_dir().'.blog.index',['posts' => $posts, 'site_settings' => $site_settings,'category'=>get_category_name($category),'category_img'=>get_category_img($category)]);
            } else {
                return view('web.errors.404');
            }

        } else {
            return redirect()->route('web.errors.404');
        }
    }


}
