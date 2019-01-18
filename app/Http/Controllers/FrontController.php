<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use App\Menu;
use App\About;
use App\User;

use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('order')->get();
        $productImg = Product::orderBy('id', 'desc')->take(4)->get();
        return view("home", ['products' => $products, "productImg" => $productImg]);
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
        return view('front.contact.contact');
    }

    public function about()
    {

        $about = About::orderBy('id', "desc")->take(1)->get();
        return view('admin.about.about', [ "data" => $about]);
    }

    public function cart()
    {
        $userId = Auth::id();
        $res = Cart::with('product')->get()->where("user_id", $userId)->toArray();
        return view('front.cart.index', [ "cart" => $res]);
    }


    public function details($id)
    {

        $products = Product::find($id);
        return view("front.details", ['products' => $products]);
    }


    public function product($name , $id)
    {

        $products = Product::all()->where("category_id", $id);
        return view('front.catalogs.product', [ "products" => $products]);

    }
    public function allProduct()
    {
        $products = Product::orderBy('order')->get();
        $productImg = Product::orderBy('id', 'desc')->take(4)->get();
        return view("front.allProducts.allProducts", ['products' => $products, "productImg" => $productImg]);

    }


}
