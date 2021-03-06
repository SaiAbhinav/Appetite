<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\ItemOrder;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{
    public function breakfast(Request $request) {
        $items = Item::where('type_id', 1)->get();
        $breakfasts = Category::all();
        return view('menu.breakfast', ['breakfasts' => $breakfasts, 'items' => $items]);
    }

    public function lunch(Request $request) {        
        $items = Item::where('type_id', 2)->get();
        $lunchs = Category::all();
        return view('menu.lunch', ['lunchs' => $lunchs, 'items' => $items]);
    }

    public function dinner(Request $request) {
        $items = Item::where('type_id', 3)->get();
        $dinners = Category::all();
        return view('menu.dinner', ['dinners' => $dinners, 'items' => $items]);
    }

    public function cart() {
        return view('menu.cart');
    }
}
