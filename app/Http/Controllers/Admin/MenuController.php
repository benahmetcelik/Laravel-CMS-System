<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(){

        $menus = DB::table('menus')->get();
        return view('admin.menus.index',['menus'=>$menus]);


    }

    public function create(){
        return view('admin.menus.create');

    }

    public function store(Request $request){
        $menu_details = $request->post();
        unset($menu_details['_token']);
        $menu_save = DB::table('menus')->insert($menu_details);
        if ($menu_save){
            return redirect()->route('admin.menus.index')->with('success','Başarıyla kaydedildi');

        }else{
            return redirect()->route('admin.menus.index')->with('error','Başarısız Oldu');
        }
    }

    public function destroy($id){
        $delete_menu = DB::table('menus')->delete($id);
        if ($delete_menu){
            $query_items = DB::table('menu_items')->where('menu','=',$id)->get();
            if (count($query_items) > 0){
                $delete_items = DB::table('menu_items')->where('menu','=',$id)->delete();
                if ($delete_items){
                    return redirect()->route('admin.menus.index')->with('success','Menu ve itemleri başarıyla silindi');
                }else{
                    return redirect()->route('admin.menus.index')->with('error','Menu silindi ancak itemleri silinemedi');
                }
            }else{
                return redirect()->route('admin.menus.index')->with('success','Menu başarıyla silindi, item bulunamadı');

            }

        }else{
            return redirect()->route('admin.menus.index')->with('error','Menu silinemedi');
        }
    }

    public function edit($id){
        $menu_detail = DB::table('menus')->where('id','=',$id)->first();
        if ($menu_detail){
            return view('admin.menus.edit',['menu'=>$menu_detail]);
        }else{
            return redirect()->route('admin.menus.index')->with('error','Bu menüye erişim bulunmuyor');
        }
    }

    public function update(Request $request,$id){
        $menu_details = $request->post();
        unset($menu_details['_token']);
      $update_menu = DB::table('menus')->where('id','=',$id)->update($menu_details);
        if ($update_menu){
            return redirect()->route('admin.menus.index')->with('success','Başarıyla kaydedildi');
        }else{
            return redirect()->route('admin.menus.index')->with('error','Başarısız Oldu');
        }
    }
    public function editItems($id){
        $menu= DB::table('menus')->where('id','=',$id)->first();
        $menu_items = DB::table('menu_items')->where('menu','=',$id)->get();
        return view('admin.menus.editItems',['menu_items'=>$menu_items,'menu'=>$menu]);
    }


    public function itemAddToMenu(Request $request){
        $menu_item = $request->post();
        unset($menu_item['_token']);
        $menu_item_save = DB::table('menu_items')->insert($menu_item);
        if ($menu_item_save){
            return true;
        }else{
            return false;
        }
    }

    public function statusUpdate(Request $request){

        $id = $request->post('id');
        $gallery = DB::table('menus')->where('id','=',$id)->first();
        if ($gallery->status == 0){
            $status = 1;
        }else{
            $status = 0;
        }


        $status_update = DB::table('menus')->where('id','=',$id)->update([
            'status' => $status
        ]);
        if ($status_update){
            return true;
        }else{
            return false;
        }

    }



    public function menusApi(Request $request){

        $type = $request->post('type');
        if ($type == 'get_all_items_for_select'){
            $this_menu = $request->post('menu');

            $items = DB::table('menu_items')->where('menu','=',$this_menu)
                ->where('parent_item','=',null)->get(['id','title']);
            if ($items){
                return $items;
            }
        }elseif ($type == 'get_last_insert_item'){
            $item = DB::table('menu_items')->orderBy('id','desc')->first();
            if ($item){
                return $item;
            }
        }elseif ($type == 'get_last_insert_item_for_this_menu'){
            $this_menu = $request->post('menu');
           // $item = DB::table('menu_items')->where('menu','=',$this_menu)->orderBy('id','desc')->get(['id','title']);
            $item = DB::table('menu_items')->where('menu','=',$this_menu)->orderBy('id','desc')->first();
            if ($item){
                return $item;
            }
        }elseif ($type=='get_all_items_for_menu'){
            $this_menu = $request->post('menu');

            $items = DB::table('menu_items')->where('menu','=',$this_menu)->orderBy('priority')->get(['id','title','route','parent_item','priority']);
            if ($items){
                return $items;
            }
        }elseif ($type == 'get_this_item_for_edit'){
            $this_item_id = $request->post('id');

            $item = DB::table('menu_items')->where('id','=',$this_item_id)->first(['id','title','route','parent_item','priority']);
            if ($item){
                return $item;
            }
        }elseif ($type == 'update_this_item'){
            $this_item_id = $request->post('id');
            $update=DB::table('menu_items')->where('id','=',$this_item_id)->update([
                'title'=>$request->post('title'),
                'route'=>$request->post('route'),
                'priority'=>$request->post('priority')
            ]);
            if ($update){
                $this_menu = $request->post('menu');

                $items = DB::table('menu_items')->where('menu','=',$this_menu)->get(['id','title','route','parent_item','priority']);
                if ($items){
                    return $items;
                }else{
                return false;
            }
            }else{
                return false;
            }
        }elseif ($type=='delete_this_item'){
            $this_item_id = $request->post('id');
            $delete_this_item = DB::table('menu_items')->where('id','=',$this_item_id)->delete();
            if ($delete_this_item){
                $parent_items = DB::table('menu_items')->where('parent_item','=',$this_item_id)->delete();
                if ($parent_items){
                    return true;
                }else{
                    return 'null_parent';
                }

            }else{
                return false;
            }


        }

    }
}
