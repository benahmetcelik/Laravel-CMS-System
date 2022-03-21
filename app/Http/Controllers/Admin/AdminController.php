<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $posts = DB::table('posts')->where('author_id','=',$user_id)->get();
        $categories = DB::table('categories')->get();
        $users = DB::table('users')->get();
         return view('admin.index',['posts'=>$posts,'categories'=>$categories,'users' => $users]);
    }
}
