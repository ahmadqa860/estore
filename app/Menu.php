<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Menu extends Model
{
    static public function save_new($request)
    {
        $menu = new self();
        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
        Session::flash('sm', 'Menu is Saved!');
    }

    static public function update_item($request, $id)
    {
        $menu = self::find($id);
        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
        Session::flash('sm', 'Menu is Updated!');
    }
}
