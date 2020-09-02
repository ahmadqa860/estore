<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\CategorieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends MainController
{

    public function index()
    {
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('cms.categories_index', self::$viewData);
    }


    public function create()
    {
        return view('cms.category_add', self::$viewData);
    }


    public function store(CategorieRequest $request)
    {
        Categorie::save_new($request);
        return redirect('cms/categories');
    }


    public function show($id)
    {
        self::$viewData['item_id'] = $id;
        return view('cms.category_delete', self::$viewData);
    }


    public function edit($id)
    {
        self::$viewData['item'] = Categorie::find($id)->toArray();
        return view('cms.category_edit', self::$viewData);
    }


    public function update(CategorieRequest $request, $id)
    {
        Categorie::update_item($request, $id);
        return redirect('cms/categories');
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        Session::flash('sm', 'Category has been deleted!');
        return redirect('cms/categories');
    }
}
