<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function index()
    {
        $allMenu = Menu::all();
        $menues = $this->recursive(999);
        $menuView = $this->menuHtml($menues);

        return view("admin.menu.index", ["menuView" => $menuView]);
    }

    public function recursive($p_id)
    {
        $menues = Menu::where('parent_id', $p_id)->orderBy('orders')->get();
        foreach ($menues as $menue) {
            $menue['children'] = $this->recursive($menue->id);
        }
        return $menues;
    }



    public function menuHtml($menues)
    {
        $menuView = "<ul class='ul'>";
        foreach ($menues as $menu) {

            if (!empty($menu['children'])) {
                $menuView .= "<li class='list-group-item' id='".$menu['id']."' parent_id='".$menu['parent_id']."'>" . $menu['name'] ;
                $menuView .= $this->menuHtml($menu['children']);
                $menuView .= "</li>";
            } else {
                $menuView .= "<li class='list-group-item' id='".$menu['id']."' parent_id='".$menu['parent_id']."'>" . $menu['name'] . "</li>";
            }
        }
        $menuView .= "</ul>";
        return $menuView;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parent_id = Menu::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view("admin.menu.create", ["parent_id" => $parent_id, 'categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formInput = $request->all();


        Menu::create($formInput);

        return redirect()->route('admin.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $req = $request->all();
        foreach ($req['data'] as $dat) {
            $menu = new Menu();
            $data = ['orders' => $dat['order'], 'parent_id' => $dat['pId']];
            $res = $menu->where('id', $dat['id'])->update($data);

        }
            echo json_encode(["data"=>"Successfully saved"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
    }
     }
