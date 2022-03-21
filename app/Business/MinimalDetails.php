<?php

namespace App\Business;

use Illuminate\Support\Facades\DB;

class MinimalDetails
{

    public static function contact_messages_count(){
        $messages = DB::table('contacts')->get();
        $count = count($messages);
        return $count;
    }

    public static function total_posts(){
        $posts = DB::table('posts')->get();
        $count = count($posts);
        return $count;
    }
    public static function total_users(){
        $users = DB::table('users')->get();
        $count = count($users);
        return $count;
    }

    public static function total_editable_section_on_active_theme(){
        $sections = DB::table('theme_settings')
            ->where('theme_id','=',ActiveTheme::active_theme_id())->get();
        $count = count($sections);
        return $count;
    }

}
