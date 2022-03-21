<?php

namespace App\Business;

use Illuminate\Support\Facades\DB;

class Sidebar
{

    public static function categories(){
        $categories = DB::table('categories')->where('parent_id','=',null)->get();
        if ($categories){
            foreach($categories as $category){

                echo '<li><a href="/">'.$category->title.'</a><span>'.count(DB::table('post_categories')->where('category_id','=',$category->id)->get()).'</span></li>';
            }



        }
    }
}
