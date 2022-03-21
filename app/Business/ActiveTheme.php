<?php

namespace App\Business;

use App\Http\Controllers\Admin\ThemeController;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class ActiveTheme
{

    public static function active_dir(){
        $theme = DB::table('themes')->where('status','=',1)->first();
        if ($theme){
            return $theme->theme_dir;

        }else{
            $theme = DB::table('themes')->first();
            if ($theme){
                $theme_actived = DB::table('themes')->where('id','=',$theme->id)->first();
                return $theme_actived->theme_dir;
            }else{
               self::find_themes_dir();
               $theme = DB::table('themes')->first();
               $theme_id = $theme->id;
               $theme_active = DB::table('themes')
                   ->where('id','=',$theme_id)
                   ->update([
                       'status'=>1
                   ]);
            }


        }
    }

    public static function active_theme_id(){
        $theme = DB::table('themes')->where('status','=',1)->first();

        if ($theme){
            return $theme->id;

        }else{
            $theme = DB::table('themes')->first();
            $theme_actived = DB::table('themes')->where('id','=',$theme->id)->first();
            return $theme_actived->id;

        }
    }


    public static function find_themes_dir(){
        $files = scandir("../resources/views/web/");
        $themes_delete = DB::table('themes')->delete();
        $theme_settings_delete = DB::table('theme_settings')->delete();
        $theme_sections_delete = DB::table('theme_groups')->delete();
        $theme_groups_delete = DB::table('theme_settings')->delete();
        foreach ($files as $file) {
            if ($file == '.' || $file == '..' || $file == '*.php') continue;
            $search_string = "#";
            $file_info = file('../resources/views/web/' . $file . "/info.txt");
            foreach ($file_info as $line) {
                if (strpos($line, $search_string) !== false) {
                    list(, $new_str) = explode(":", $line);
                    // If you don't want the space before the word bong, uncomment the following line.
                    $theme_name = htmlspecialchars(substr_replace(ltrim($new_str), "", -2));
                    $theme = [
                        'name' => $theme_name,
                        'theme_dir' => $file,
                        'img_url' => $file . '/ss.png',
                        'status' => 0
                    ];
                    $themeSaveId = DB::table('themes')->insertGetId($theme);
                }
            }
        }
    }

}
