<?php

namespace App\Http\Controllers\Admin;

use App\Business\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.users.index', ['users' => $users]);

    }

    public function create()
    {
        $users = DB::table('users')->get();

        return view('admin.users.create', ['users' => $users]);

    }


    public function store(Request $request)
    {
        $post_user = $request->post();
        unset($post_user['_token']);
        $post_user['password'] = Hash::make($post_user['password']);
        $user_img = $request->file('img_url');
        if ($user_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'users', 'user_');
            if ($uploadImage) {
                $post_user['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.posts.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        $saveUser = DB::table('users')->insert($post_user);
        if ($saveUser) {
            return redirect()->route('admin.users.index')->with('success', 'Kullanıcı başarıyla eklendi');

        } else {
            return redirect()->route('admin.users.create')->with('error', 'Kullanıcı Eklenemedi');

        }

    }


    public function edit($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        $users = DB::table('users')->get();
        return view('admin.users.edit', ['user' => $user, 'users' => $users]);

    }




    public function update(Request $request, $id)
    {

        $post_user = $request->post();
        unset($post_user['_token']);
        $user_img = $request->file('img_url');
        $old_user = DB::table('users')->where('id','=',$id)->first();
        unset($post_user['img_url']);
        if ($user_img != null) {
            $uploadImage = ImageUploader::upload($request, 'img_url', 'users', 'user_');
            if ($uploadImage) {
                @unlink('web/users/'.$old_user->img_url);
                $post_user['img_url'] = $uploadImage;
            } else {
                return redirect()->route('admin.posts.index')->with('error', 'Resim Yüklenirken Bir Hata Oluştu');
            }
        }
        if ($post_user['password'] == null) {

            $user_pass = DB::table('users')->where('id', '=', $id)->first();
            $post_user['password'] = $user_pass->password;
        } else {
            $post_user['password'] = Hash::make($post_user['password']);

        }

        $updateUser = DB::table('users')->where('id', '=', $id)->update($post_user);

        if ($updateUser) {

            return redirect()->route('admin.users.index')->with('success', 'Kullanıcı Başarıyla Güncellendi');

        } else {
            return redirect()->route('admin.users.edit', $id)->with('error', 'Bir sorun meydana geldi');

        }
    }


    public function destroy($id)
    {

        $userDelete = DB::table('users')->delete($id);
        if ($userDelete){
            return redirect()->route('admin.users.index')->with('success', 'Kullanıcı Başarıyla Silindi');

        }else{
            return redirect()->route('admin.users.index', $id)->with('error', 'Bir sorun meydana geldi');

        }


    }
}
