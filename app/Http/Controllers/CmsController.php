<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class CmsController extends MainController
{
    public function dashboard()
    {
        return view('cms.dashboard', self::$viewData);
    }

    public function orders()
    {
        self::$viewData['orders'] = Order::getOrders();
        return view('cms.orders', self::$viewData);
    }
}
