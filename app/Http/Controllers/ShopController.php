<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use Cart;
use App\Order;
use Illuminate\Support\Facades\Session;

class ShopController extends MainController
{
    public function categories()
    {
        self::$viewData['categories'] = Categorie::all()->toArray();
        self::$viewData['page_title'] .= 'Shop Categories';
        return view('categories', self::$viewData);
    }

    public function products($curl)
    {
        Product::getProducts($curl, self::$viewData);
        return view('products', self::$viewData);
    }

    public function item($curl, $purl)
    {
        if ($item = Product::Where('purl', '=', $purl)->first()) {
            $item = $item->toArray();
        } else {
            abort(404);
        }

        self::$viewData['page_title'] .= $item['ptitle'];
        self::$viewData['item'] = $item;
        return view('item', self::$viewData);
    }

    public function AddToCart(Request $request)
    {

        Product::addToCart($request['pid']);
    }

    public function cart()
    {
        self::$viewData['page_title'] .= 'Shop Cart Page';
        $cart = Cart::getContent()->toArray();
        sort($cart);
        self::$viewData['cart'] = $cart;
        return view('cart', self::$viewData);
    }

    public function clearCart()
    {
        Cart::clear();
        return redirect('shop/cart');
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect('shop/cart');
    }

    public function updateCart(Request $request)
    {
        Product::updateCart($request['pid'], $request['op']);
    }

    public function orderNow()
    {
        if (Cart::isEmpty()) {
            return redirect('shop/cart');
        }
        if (!Session::has('user_id')) {
            return redirect('user/signup?rn=shop/cart');
        }

        Order::save_new();
        return redirect('shop');
    }
}
