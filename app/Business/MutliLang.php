<?php

namespace App\Business;

use Illuminate\Support\Facades\DB;

class MutliLang
{
    public static function all_lang_shorts()
    {

        $langs = DB::table('languages')->where('status', '=', 1)->get();
        if (count($langs) > 0) {

            return $langs;
        } else {

        self::default_lang_import('all_lang_shorts');
        }
    }

    public static function active_lang_id()
    {
        $default_lang_id = site_settings('default_lang_id');

        $langs = DB::table('languages')
            ->where('id', '=', $default_lang_id)
            ->where('status', '=', 1)->first();
        if ($langs) {
            return $langs->id;
        } else {
            self::default_lang_import('active_lang_id');
        }
    }

    public static function default_lang_import($return_this_func)
    {

        $lang_import_en = DB::table('languages')->insert([
            'lang_name' => 'English',
            'lang_short' => 'en',
            'lang_flag' => 'lang1645564383-5523.png',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s", strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s", strtotime('now')),
        ]);
        $lang_import_tr = DB::table('languages')->insert([
            'lang_name' => 'Türkçe',
            'lang_short' => 'tr',
            'lang_flag' => 'service1645562353-92878.png',
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s", strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s", strtotime('now')),
        ]);
        if ($lang_import_en && $lang_import_tr) {
            if ($return_this_func == 'active_lang_id'){
                self::active_lang_id();
            }else if ($return_this_func == 'all_lang_shorts'){
                self::all_lang_shorts();
            }
        }

    }

    public static function create_lang_sections($lang_id){
        $sections = DB::table('theme_settings')->get();

        if ($sections){
            foreach ($sections as $section){
                $translate_insert = DB::table('translate_languages')->insert([
                    'lang_id'=>$lang_id,
                    'theme_id'=>ActiveTheme::active_theme_id(),
                    'section_key'=>$section->setting_key,
                    'translate'=>$section->setting_value,
                ]);
            }
        }

    }

    public static function create_lang_section_for_theme($section_id,$section_key,$translate,$lang_id,$theme_id,$group){


        $translate_control = DB::table('translate_languages')
            ->where('lang_id','=',$lang_id)
            ->where('theme_id','=',$theme_id)
            ->where('section_key','=',$section_key)
            ->where('section_id','=',$section_id)
            ->where('section_group','=',$group)

            ->first();
        if (!$translate_control){
            $translate_save = DB::table('translate_languages')
                ->insert([
                   'lang_id'=>$lang_id,
                   'theme_id'=>ActiveTheme::active_theme_id(),
                   'section_id'=>$section_id,
                   'section_key'=>$section_key,
                   'translate'=>$translate,
                   'section_group'=>$group
                ]);
            if ($translate_save){
                return true;
            }else{
                return false;
            }
        }


    }

    public static function control_lang_section_for_view($section_id,$section_key,$translate,$lang_id,$theme_id,$group){

        $translate_control = DB::table('translate_languages')->where('section_id','=',$section_id)
            ->where('lang_id','=',$lang_id)
            ->where('theme_id','=',$theme_id)
            ->where('section_group','=',$group)
            ->first();
        if (!$translate_control){
            self::create_lang_section_for_theme($section_id,$section_key,$translate,$lang_id,$theme_id,$group);
        }

    }

    public static function lang_select_for_view($session_lang){
        $languages = DB::table('languages')->where('status','=',1)->get();
        if ($languages){
            foreach ($languages as $lang){
                if ($session_lang == $lang->lang_short){
                    echo ' <option  value="'.$lang->lang_short.'" selected'.'>'.$lang->lang_name.'</option>';

                }else{
                    echo ' <option  value="'.$lang->lang_short.'"  '.'>'.$lang->lang_name.'</option>';

                }

            }
        }
    }


   public static function default_lang_short(){
        $langs = DB::table('languages')
            ->where('default_lang', '=', 1)
            ->where('status', '=', 1)
            ->first();
        if ($langs) {
            return $langs->lang_short;
        }else{
            $lang = DB::table('languages')
                ->where('status','=',1)->first();
            if ($lang){
                $update = DB::table('languages')
                    ->where('id','=',$lang->id)
                    ->update([
                        'default_lang'=>1
                    ]);
                if ($update){
                    return $lang->lang_short;
                }else{
                    return  'en';
                }
            }else{
                $lang = DB::table('languages')->first();
                $update = DB::table('languages')
                    ->where('id','=',$lang->id)
                    ->update([
                        'status'=>1
                    ]);
                if ($update){
                    self::default_lang_short();
                }
            }
        }
    }

    public static function active_lang_name($session_lang){
        $default_lang_id = site_settings('default_lang_id');

        $langs = DB::table('languages')
            ->where('lang_short', '=', $session_lang)
            ->where('status', '=', 1)->first();
        if ($langs) {
            return $langs->lang_name;
        } else {
            $lang = DB::table('languages')
                ->where('default_lang', '=', 1)->first();
            return $lang->lang_name;

        }
    }

}
