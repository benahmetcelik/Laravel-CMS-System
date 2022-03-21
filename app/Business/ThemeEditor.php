<?php

namespace App\Business;

use Illuminate\Support\Facades\DB;
use App\Business\MutliLang;

class ThemeEditor
{


    public static function sectionValue($sectionKey, $defaultValue = '', $section_title = '', $section_type = '', $group = '',$session_lang='')
    {
        if (isset($defaultValue)) {

            if ($defaultValue == '') {
                $defaultValue = 'Varsayılan Cümle';
            }
        } else {
            $defaultValue = 'Varsayılan Cümle';
        }

        if (isset($group)) {

            if ($group == '') {
                $group = 'Varsayılan Grup';
            } else {
                $group = intval($group);
            }

        } else {
            $group = 'Varsayılan Grup';
        }


        if (isset($session_lang)){
            if ($session_lang != '') {
                $session_lang = MutliLang::default_lang_short();
            }
        }


        $theme_settings = DB::table('theme_settings')->where('theme_id', '=', ActiveTheme::active_theme_id())
            ->where('setting_key', '=', $sectionKey)
            ->first();
        if ($theme_settings) {
            $lang_id = getLangId(session()->get('locale'));
            $active_theme_id = ActiveTheme::active_theme_id();
            MutliLang::control_lang_section_for_view($theme_settings->id, $theme_settings->setting_key, $theme_settings->setting_value, $lang_id,$active_theme_id,$group);

            $return_value = __('general.'.$theme_settings->setting_key,[],$session_lang);
            return $return_value;

        } else {
            $setting_group = $group;
            $theme_settings_save = DB::table('theme_settings')->insertGetId([
                'theme_id' => ActiveTheme::active_theme_id(),
                'setting_title' => $section_title,
                'setting_type' => $section_type,
                'setting_key' => $sectionKey,
                'setting_value' => $defaultValue,
                'setting_group' => $setting_group,
                'created_at' => date("Y-m-d H:i:s", strtotime('now')),
                'updated_at' => date("Y-m-d H:i:s", strtotime('now')),
            ]);
            if ($theme_settings_save) {
                $lang_id = getLangId(session()->get('locale'));
                $section_id = $theme_settings_save;
                $active_theme_id = ActiveTheme::active_theme_id();
                MutliLang::create_lang_section_for_theme($section_id, $sectionKey, $defaultValue, $lang_id,$active_theme_id,$group);
                $return_value = __('general.'.$sectionKey,[],$session_lang);

                return $return_value;
            } else {
              $return_value = __('general.'.$sectionKey,[],$session_lang);
                return $return_value;
            }
        }
    }

    public static function groupSection($group_title, $status)
    {
        if (!isset($status)) {
            $status = 1;
        }
        $theme_setting_group = DB::table('theme_groups')->where('group_title', '=', $group_title)->first();
        if (!$theme_setting_group) {
            $theme_settings_group_save = DB::table('theme_groups')->insertGetId([
                'group_title' => $group_title,
                'theme_id' => ActiveTheme::active_theme_id(),
                'status' => $status,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ]);
            if ($theme_settings_group_save > 0) {
                return $theme_setting_group_return = 1;
            } else {
                return $theme_setting_group_return = 0;
            }
        } else {
            return $theme_setting_group_return = $theme_setting_group->status;
        }
    }

    public static function getGroupId($group_title)
    {
        $group = DB::table('theme_groups')->where('group_title', '=', $group_title)->first();
        if ($group) {
            return $group->id;
        }
    }

    public static function getThemeSetting($key)
    {
        $theme_setting = DB::table('theme_settings')
            ->where('theme_id', '=', ActiveTheme::active_theme_id())
            ->where('setting_key', '=', $key)->first();
        if ($theme_setting) {
            return true;
        } else {
            return false;
        }
    }

}
