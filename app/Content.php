<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Content extends Model
{
    static public function getContent($url)
    {
        $contents = DB::table('contents as c')
            ->join('menus as m', 'm.id', '=', 'c.menu_id')
            ->where('m.url', '=', $url)
            ->select('c.*', 'm.title')
            ->get()
            ->toArray();

        return $contents;
    }

    static public function save_new($request)
    {
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->ctitle = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'Content is Saved');
    }

    static public function update_item($request, $id)
    {
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->ctitle = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'Content is Updated!');
    }
}
