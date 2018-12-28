<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use App\Menu;
use App\About;

class FrontController extends Controller
{
    public function index()
    {
        $menues = $this->recursive(999);
        $products = Product::all();
        $productImg = Product::orderBy('id')->take(4)->get();

        return view("front.home", ['products' => $products,"productImg"=>$productImg, "menues" => $menues]);
    }

    public function recursive($p_id)
    {
        $menues = Menu::where('parent_id', $p_id)->orderBy('orders')->get();
        foreach ($menues as $menue) {
            $menue['children'] = $this->recursive($menue->id);
        }
        return $menues;
    }

    public function contact()
    {
        $menues = $this->recursive(999);
        return view('front.contact.contact', ["menues" => $menues]);
    }

    public function about()
    {

        $about = About::orderBy('id')->take(1)->get();
        $menues = $this->recursive(999);
        return view('admin.about.about', ["menues" => $menues, "data" => $about]);
    }

    public function cart()
    {

        $cart = Cart::all();
        $menues = $this->recursive(999);
        return view('front.cart.index', ["menues" => $menues, "cart" => $cart]);
    }


    public function shirt($id)
    {

        $products = Product::find($id);

        $menues = $this->recursive(999);

        return view("front.shirt", ['products' => $products, "menues" => $menues]);
    }


    public function product($id)
    {

        $products = Product::all()->where("category_id", $id);

        $menues = $this->recursive(999);
        return view('front.catalogs.product', ["menues" => $menues, "product" => $products]);

    }


}
