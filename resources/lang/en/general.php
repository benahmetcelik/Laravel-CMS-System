<?php

try {
    $lang_id = getLangId(session()->get('locale'));
} catch (\Psr\Container\NotFoundExceptionInterface|\Psr\Container\ContainerExceptionInterface $e) {
}

$theme_settings = \Illuminate\Support\Facades\DB::table('translate_languages')
    ->join('theme_settings', 'theme_settings.setting_key', '=', 'translate_languages.section_key')
    ->where('lang_id','=',$lang_id)
    ->get();

$return = [];

foreach ($theme_settings as $section) {

    $return[$section->section_key] = $section->translate;

}


return $return;
