<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\CategorieRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\ProductRequest;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends MainController
{

    public function index()
    {
        self::$viewData['products'] = Product::all()->toArray();
        return view('cms.products_index', self::$viewData);
    }


    public function create()
    {
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('cms.product_add', self::$viewData);
    }


    public function store(ProductRequest $request)
    {
        Product::save_new($request);
        return redirect('cms/products');
    }


    public function show($id)
    {
        self::$viewData['item_id'] = $id;
        return view('cms.product_delete', self::$viewData);
    }


    public function edit($id)
    {
        self::$viewData['item'] = Product::find($id)->toArray();
        self::$viewData['categories'] = Categorie::all()->toArray();
        return view('cms.product_edit', self::$viewData);
    }


    public function update(ProductRequest $request, $id)
    {
        Product::update_item($request, $id);
        return redirect('cms/products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('sm', 'Product has been deleted!');
        return redirect('cms/products');
    }
}
