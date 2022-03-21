<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use ZipArchive as ZipArchiveAlias;

class WaterMarkController extends Controller
{
    public function index(){
        $date= date('d-m');
        echo public_path('backend/post-designs/'.$date.'.png');

    }


    public function imageWatermark()
    {
        $date= date('d-m');
        $site_settings = DB::table('site_settings')->first();
            $images = glob(public_path('backend/post-designs') . "/*.png");
            $new_folder_name = 'sosyal-medya-postlar-' . rand(0, 999) . '-' . rand(0, 999).'-'.$site_settings->title;
            $folder = mkdir(public_path('backend/socials/') . $new_folder_name);
            if (!$folder) {
                echo 'Bir sorun oluştu';
                return false;
                // return view('admin.show_watermark', compact('new_image'));

            }
        if ($site_settings->logo_url != null) {

            foreach ($images as $image) {


                $files = preg_split('[/]', $image);

                $last_index = count($files);
                $last_index -= 1;

                $file = public_path('backend/post-designs/' . $files[$last_index]);
                if (!file_exists($file)) {
                    $file = public_path('backend/img/logo/wk.jpg');
                }
                $img = Image::make($file);
                //$img->resize(1080, 1080);
                /* insert watermark at bottom-right corner with 10px offset */
                $logo_url = $site_settings->logo_url;
                $logo = Image::make(public_path('web/site_general/' . $logo_url));
                //$logo->resize(220,110);
                $logo->widen(150);
                //$img->insert($logo, 'top-left', 10, 10);
                $logo->opacity(80);
                $img->insert($logo, 'bottom-center', 0, 10);

                $new_image_name = rtrim($files[$last_index], '.png');


                $img->save(public_path('backend/socials/' . $new_folder_name . '/' . $new_image_name . '.png'));

                $img->encode('png');
                $type = 'png';
                $new_image = 'data:image/' . $type . ';base64,' . base64_encode($img);
            }
            $zip_file = public_path('backend/socials/' . $new_folder_name . '.zip');
            $zip = new ZipArchiveAlias();
            $zip->open($zip_file, ZipArchiveAlias::CREATE | ZipArchiveAlias::OVERWRITE);

            $path = public_path('backend/socials/' . $new_folder_name);
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
            foreach ($files as $name => $file) {
                // We're skipping all subfolders
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();

                    // extracting filename with substr/strlen
                    $relativePath = $new_folder_name . '/' . substr($filePath, strlen($path) + 1);

                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
            deleteFiles(public_path('backend/socials/') . $new_folder_name);
            $file_url = 'backend/socials/' . $new_folder_name . '.zip';
            return $file_url;
            // return response()->download($zip_file);

        }else {
        self::textWatermark($site_settings->title,$new_folder_name,$images);
        }

        //return view('admin.show_watermark', compact('new_image'));
    }

    public function textWatermark($text,$folder,$images)
    {
        foreach ($images as $image) {


            $files = preg_split('[/]', $image);

            $last_index = count($files);
            $last_index -= 1;

            $file = public_path('backend/post-designs/' . $files[$last_index]);
            if (!file_exists($file)) {
                $file = public_path('backend/img/logo/wk.jpg');
            }
            $new_image_name = rtrim($files[$last_index], '.png');
            $img = Image::make($file);

            $img->text($text, 710, 370, function ($font) {
                $font->size(30);
                $font->color('#f4d442');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });


            $img->save(public_path('backend/socials/'.$folder.'/'.$new_image_name.'.png'));

            $img->encode('png');
            $type = 'png';
            $new_image = 'data:image/' . $type . ';base64,' . base64_encode($img);
        }
        die();
        return view('show_watermark', compact('new_image'));
    }
}
