<?php

namespace App\Business;

use Illuminate\Support\Facades\DB;

class WebMenuView
{
    /**
     * @param $layout
     * @return void
     */
    public static function menuView($layout, $route_before, $title_before, $title_after, $menu_end, $sub_item_start = '', $sub_route_before = '', $sub_title_before = '', $sub_title_after = '', $sub_item_end = '')
    {

        $menu = DB::table('menus')->where('layout', '=', $layout)
            ->leftJoin('menu_items', 'menu_items.menu', '=', 'menus.id')
            ->orderBy('priority')
            ->get();

        if ($menu) {
            foreach ($menu as $item) {
                if ($item->parent_item == null) {

                    echo $route_before . $item->route . $title_before . $item->title . $title_after;

                    if ($sub_route_before != '') {
                        if (self::sub_items_control($item->id) == true) {
                            echo $sub_item_start;


                            self::sub_items_view($item->id, $sub_route_before, $sub_title_before, $sub_title_after);


                            echo $sub_item_end;
                        }
                    }

                    echo $menu_end;

                }
            }
        }


    }

    public static function sub_items_view($id, $route_after, $title_after, $item_end)
    {
        $items = DB::table('menu_items')
            ->where('parent_item', '=', $id)
            ->get();
        if ($items) {
            foreach ($items as $item) {
                if (!empty($item->title)) {
                    echo $route_after . $item->route . $title_after . $item->title . $item_end;

                }
            }
        }


    }

    public static function sub_items_control($id)
    {
        $items = DB::table('menu_items')
            ->where('parent_item', '=', $id)
            ->first();
        if ($items) {
            return true;
        } else {
            return false;
        }
    }


}
