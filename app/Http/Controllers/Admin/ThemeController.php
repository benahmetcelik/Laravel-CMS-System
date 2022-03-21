<?php

namespace App\Http\Controllers\Admin;

use App\Business\ActiveTheme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Business\ThemeEditor;

class ThemeController extends Controller
{


    public function index()
    {
        $themes = DB::table('themes')->orderBy('id')->get();
        $themes = $themes->toArray();


        return view('admin.theme.index', ['themes' => $themes]);
    }


    public function findTheme(Request $request)
    {
        $files = scandir("../resources/views/web/");
        $themes_delete = DB::table('themes')->delete();
        $theme_settings_delete = DB::table('theme_settings')->delete();
        $theme_sections_delete = DB::table('theme_groups')->delete();
        $theme_groups_delete = DB::table('theme_settings')->delete();
        $translate_languages     = DB::table('translate_languages')->delete();
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
        return redirect()->route('admin.theme.index');
    }

    public function statusUpdate(Request $request)
    {
        $id = $request->post('id');
        $category = DB::table('themes')->where('id', '=', $id)->first();
        if ($category->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        $all_status = DB::table('themes')->where('status', '=', '1')->update([
            'status' => 0
        ]);

        $status_update = DB::table('themes')->where('id', '=', $id)->update([
            'status' => $status
        ]);
        if ($status_update) {
            return true;
        } else {
            return false;
        }

    }


    public function editTheme($id)
    {

        $groups = DB::table('theme_groups')->where('theme_id', '=', $id)->get();
        if (!$groups){

            return redirect()->route('index');
        }else{
            return view('admin.theme.edit', ['groups' => $groups]);

        }
        // $sections = DB::table('theme_settings')->where('theme_id','=',$id)->get();

    }


    public function editDetails($theme_id, $group_id)
    {


        $group = DB::table('theme_groups')->where('id', '=', $group_id)->first();
        $settings = DB::table('theme_settings')->where('theme_id', '=', $theme_id)
            ->where('setting_group', '=', $group_id)->get();
        //  return view('admin.theme.edit',['sections'=>$sections,'groups'=>$groups]);
        return view('admin.theme.edit-details', ['group' => $group, 'sections' => $settings]);


    }


    public function detailsStore(Request $request)
    {
        $posted = $request->post();
        unset($posted['_token']);
        $value = $posted['value'];
        $id = $posted['id'];
        $detailsUpdate = DB::table('theme_settings')->where('id', '=', $id)->update([
            'setting_value' => $value
        ]);
        if ($detailsUpdate) {
            return true;
        } else {
            return false;
        }

    }


}
