<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', '=', $id)->first();
        $users = DB::table('users')->get();
        return view('admin.profile.edit', ['user' => $user,'users'=>$users]);

    }

    public function update(Request $request)
    {
        $id= Auth::id();
        $post_user = $request->post();
        unset($post_user['_token']);

        if ($post_user['password'] == null) {

            unset($post_user['password']);
        } else {
            $post_user['password'] = Hash::make($post_user['password']);

        }
        $profile_img = $request->file('img_url');
        if ($profile_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'users', 'user');
            if ($uploadImage) {
                @unlink('web/users/'.$post_user->img_url);
                $post_user['img_url'] = $uploadImage;

            } else {

                return redirect()->route('admin.profile.edit')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');

            }
        }

        $updateUser = DB::table('users')->where('id', '=', $id)->update($post_user);

        if ($updateUser) {

            return redirect()->route('admin.profile.edit');

        } else {
            return redirect()->route('admin.profile.edit');

        }
    }

}
