<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $site_settings = DB::table("site_settings")->first();
        return view("admin.settings.index", ['settings' => $site_settings]);
    }

    public function logo_update(Request $request){


        $logo = $request->file('logo_url');
        if (!empty($logo)) {
            $uploadImage = ImageUploader::upload($request, 'logo_url', 'site_general', 'logo');

            if ($uploadImage) {
                $update = DB::table("site_settings")->update([
                    'logo_url' => $uploadImage
                ]);
                if ($update){
                    return redirect()->route('admin.settings.index')->with('success','Logonuz Değiştirildi');
                }else{
                    return redirect()->route('admin.settings.index')->with('error','Logonuz Değiştirilemedi');

                }
            }

        }



    }


    public function update(Request $request)
    {
        $data = $request->post();
        unset($data["_token"]);
        $install = DB::table('site_settings')->first();
        if (!$install){
        $this->install($data);
        }





            $update = DB::table("site_settings")->update([
                $data['column'] => $data['value']
            ]);


        if ($update) {
            return true;
        } else {
            return false;
        }
    }


    public function install($request){
        $insert = DB::table('site_settings')->insert([
            $request['column'] => $request['value']
        ]);
        if ($insert){
            return true;
        } else {
            return false;
        }
    }
}
