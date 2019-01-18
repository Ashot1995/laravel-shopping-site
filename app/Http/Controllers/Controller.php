<?php

namespace App\Http\Controllers;
use App\Logo;
use App\Menu;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $menues = $this->recursive(null);
        $menuFront = $this->menuFront($menues);
        $logos = Logo::all();
        View::share("menuFront",$menuFront);
        View::share("logos",$logos);

    }

    public function menuFront($menues)
    {
        $menuView = "<ul style='z-index: 999'>";
        foreach ($menues as $menu) {

            if (count($menu['children']) && $menu['active']) {
                $menuView .= "<li class='current-menu-item'><a href='/front" . $menu['url'] . '/' . $menu['category_id'] . "'>" . $menu['name'];
                $menuView .= $this->menuFront($menu['children']);
                $menuView .= "</a></li>";
            } else {
                if ($menu['active']) {
                    $menuView .= "<li><a href='/front" . $menu['url'] . '/' . $menu['category_id'] . "'>" . $menu['name'] . "</li>";
                }
            }
        }
        $menuView .= "</ul>";
        return $menuView;
    }
    public function recursive($p_id)
    {
        $menues = Menu::where('parent_id', $p_id)->orderBy('orders')->get();
        foreach ($menues as $menue) {
            $menue['children'] = $this->recursive($menue->id);
        }
        return $menues;
    }

}
