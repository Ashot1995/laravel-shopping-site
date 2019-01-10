<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function recursive($p_id)
//    {
//        $menues = Menu::where('parent_id', $p_id)->orderBy('orders')->get();
//        foreach ($menues as $menue) {
//            $menue['children'] = $this->recursive($menue->id);
//        }
//        return $menues;
//
//
//    }


}
