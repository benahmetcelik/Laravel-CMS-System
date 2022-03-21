<?php

namespace App\Http\Controllers\Admin;

use App\Business\ActiveTheme;
use App\Business\ImageUploader;
use App\Business\MutliLang;
use App\Business\ThemeEditor;
use App\Business\Translate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MultilangController extends Controller
{
    public function index()
    {
        $langs = DB::table('languages')->get();
        return view('admin.multilang.index', ['langs' => $langs]);

    }
    public function create()
    {
        return view('admin.multilang.create');

    }
    public function store(Request $request)
    {

        $multilang = $request->post();
        unset($multilang['_token']);
        $multilang['created_at'] = date("Y-m-d H:i:s", strtotime('now'));
        $multilang['updated_at'] = date("Y-m-d H:i:s", strtotime('now'));
        $multilang_img = $request->file('lang_flag');
        if ($multilang_img != null) {
            $uploadImage = ImageUploader::upload($request, 'lang_flag', 'langs', 'lang');
            if ($uploadImage) {
                $multilang['lang_flag'] = $uploadImage;
            } else {
                return redirect()->route('admin.multilang.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        $saveLang = DB::table('languages')->insertGetId($multilang);
        if ($saveLang) {
            $savedLangDetails = DB::table('languages')->where('id','=',$saveLang)->first();
            createLangDirAndFiles($savedLangDetails->lang_short,$savedLangDetails->id);
            return redirect()->route('admin.multilang.index');
        }


    }

    // I am tired
    public function update(Request $request,$id)
    {
        $lang=DB::table('languages')->where('id','=',$id)->first();
        $lang_content = $request->post();
        unset($lang_content['_token']);
        $lang_content['updated_at']=date("Y-m-d H:i:s", strtotime('now'));
        $lang_flag = $request->file('img_url');
        if ($lang_flag != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'langs', 'lang');
            if ($uploadImage) {
                @unlink('web/lang/'.$lang->img_url);
                $lang_content['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.multilang.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        $saveLang = DB::table('languages')
            ->where('id','=',$id)
            ->update($lang_content);
        /**
         * Buraya default ise diğerini 0 yap kodu eklenecek
         */
      //  $lang_content['default']
        if ($saveLang){
            return redirect()->route('admin.multilang.index');
        }
    }

    public function destroy($id)
    {
        $lang = DB::table('languages')->where('id', '=', $id)->first();
        if ($lang) {
            if (deleteLangDir($lang->lang_short)) {
                $delete_lang = DB::table('languages')->delete($lang->id);
                if ($delete_lang) {
                    return redirect()->route('admin.multilang.index')->with('error', 'Silinme İşlemi Tamamlandı.');
                } else {
                    return redirect()->route('admin.multilang.index')->with('error', 'Klasörler temizlendi ancak veritabanındn kayıt silinmedi.');
                }
            } else {
                return redirect()->route('admin.multilang.index')->with('error', 'Klasörler silinmedi.');
            }
        } else {
            return redirect()->route('admin.multilang.index')->with('error', 'Bu dil zaten mevcut değil');
        }
    }
    public function edit($lang_short)
    {
       $lang = DB::table('languages')->where('lang_short','=',$lang_short)->first();
       if ($lang){
               return view('admin.multilang.edit',['lang'=>$lang]);

       }
    }
    public function translate($lang_short){

        $lang = DB::table('languages')->where('lang_short','=',$lang_short)->first();
        if ($lang){
            $translate = DB::table('translate_languages')->where('lang_id','=',$lang->id)
                ->where('theme_id','=',ActiveTheme::active_theme_id())->get();
            $groups = DB::table('theme_groups')->get();
            if ($translate && $groups){
                return view('admin.multilang.translate',['lang'=>$lang_short,'groups'=>$groups]);
            }
        }


    }
    public function translate_group($lang,$id){
       $lang_id = getLangId($lang);
       $lang_name = getLangName($lang);

       $theme_settings = DB::table('theme_settings')->where('setting_group','=',$id)->get();
        if ($theme_settings){

            $language_translate= DB::table('translate_languages')->where('lang_id','=',$lang_id)
                ->where('theme_id','=',ActiveTheme::active_theme_id())
                ->where('section_group','=',$id)->get();

            $groups = DB::table('theme_groups')
                ->where('id','=',$id)
                ->first();
            if ($groups){

                return view('admin.multilang.translate_sections',['group'=>$groups,'language_translate'=>$language_translate,'lang_name'=>$lang_name,'lang_short'=>$lang]);
            }

        }
    }
    public function statusUpdate()
    {
        echo 'a';
    }
    public function save_one_translate(Request $request){

        $word = $request->post();
        unset($word['_token']);

        $value = $word['value'];
        $id = $word['id'];

        if ($id != null && $value != null){
            if ($id != '' && $value != ''){

                $lang_update = DB::table('translate_languages')->where('id','=',$id)
                    ->update([
                        'translate'=>$value
                    ]);
                if ($lang_update){
                    return true;
                }else{
                    return false;
                }
                return false;

            }
            return false;

        }
        return false;


    }
    public function translate_one_words(Request $request){
        $words = $request->post();
        unset($words['_token']);
        $source = $words['source'];
        $target = $words['target'];
        $text = $words['text'];
        //Translate::set()
     // $response =  Translate::set($source,$target,$text);
      if ($text != null){
          return  Translate::set($source,$target,$text);
      }else{
          return false;
      }

    }
}
