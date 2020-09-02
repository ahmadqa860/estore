<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MainController extends Controller
{
    public static $viewData = ['page_title' => 'Estore | '];

    public function __construct()
    {
        self::$viewData['menu'] = Menu::all()->toArray();
    }
}