<?php

namespace App\Http\Controllers;

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
        $products = Product::all();
        $productImg = Product::orderBy('id', 'desc')->take(4)->get();
        $menues = $this->recursive(null);
        $menuFront = $this->menuFront($menues);

        return view("home", ['menuFront' => $menuFront, 'products' => $products, "productImg" => $productImg]);
    }

    public function recursive($p_id)
    {
        $menues = Menu::where('parent_id', $p_id)->orderBy('orders')->get();
        foreach ($menues as $menue) {
            $menue['children'] = $this->recursive($menue->id);
        }
        return $menues;
    }

    public function menuFront($menues)
    {
        $menuView = "<ul style='z-index: 999'>";
        foreach ($menues as $menu) {

            if (count($menu['children']) && $menu['active']) {
                $menuView .= "<li class='current-menu-item'><a href='" . $menu['url'] . '/' . $menu['category_id'] . "'>" . $menu['name'];
                $menuView .= $this->menuFront($menu['children']);
                $menuView .= "</a></li>";
            } else {
                if ($menu['active']) {
                    $menuView .= "<li><a href='" . $menu['url'] . '/' . $menu['category_id'] . "'>" . $menu['name'] . "</li>";
                }
            }
        }
        $menuView .= "</ul>";
        return $menuView;
    }

    public function contact()
    {
        $menues = $this->recursive(null);
        $menuFront = $this->menuFront($menues);
        return view('front.contact.contact', ["menuFront" => $menuFront]);
    }

    public function about()
    {

        $about = About::orderBy('id', "desc")->take(1)->get();
        $menues = $this->recursive(null);
        $menuFront = $this->menuFront($menues);
        return view('admin.about.about', ["menuFront" => $menuFront, "data" => $about]);
    }

    public function cart()
    {
        $userId = Auth::id();
        $res = Cart::with('product')->get()->where("user_id", $userId)->toArray();
        $menues = $this->recursive(null);
        $menuFront = $this->menuFront($menues);
        return view('front.cart.index', ["menuFront" => $menuFront, "cart" => $res]);
    }


    public function shirt($id)
    {

        $products = Product::find($id);
        $menues = $this->recursive(null);
        $menuFront = $this->menuFront($menues);

        return view("front.shirt", ['products' => $products, "menuFront" => $menuFront]);
    }


    public function product($id)
    {

        $products = Product::all()->where("category_id", $id);

        $menues = $this->recursive(null);
        $menuFront = $this->menuFront($menues);

        return view('front.catalogs.product', ["menuFront" => $menuFront, "products" => $products]);

    }



}
