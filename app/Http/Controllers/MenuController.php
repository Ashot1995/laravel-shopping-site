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
        $menues = $this->recursive(null);
        $menuView = $this->menuHtml($menues, true);
        $parent_id = Menu::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view("admin.menu.index",
            ["a" => $allMenu, "menuView" => $menuView, "parent_id" => $parent_id, 'categories' => $categories]);
    }

    public function recursive($p_id)
    {
        $menues = Menu::where('parent_id', $p_id)->orderBy('orders')->get();
        foreach ($menues as $menue) {
            $menue['children'] = $this->recursive($menue->id);
        }
        return $menues;
    }


    public function menuHtml($menues, $first = false)
    {
        $ulClass = $first ? 'menus' : '';

        $menuView = '<ul class="' . $ulClass . '">';

        foreach ($menues as $menu) {
            if (!empty($menu['children'] && $menu['active'])) {

                $menuView .= "<li class='list-group-item text-center' id='" . $menu['id'] . "' parent_id='" . $menu['parent_id'] . "'>" . $menu['name'];
                $menuView .= $this->menuHtml($menu['children']);
                $menuView .= "<img src='/images/icons/delete.png' alt='delete' class='delete clickable' id='" . $menu['id'] . "' height='20px'width='20px' style='float: right ;margin-top:-20px;'>
<img src='/images/icons/edit.png' alt='Edit' class='edit clickable'id='" . $menu['id'] . "' height='20px'width='20px' style='float: right;margin:-20px '>
</li>";
            } else {
                if ($menu['active']) {
                    $menuView .= "<li class='list-group-item text-center' id='" . $menu['id'] . "' parent_id='" . $menu['parent_id'] . "'>" . $menu['name'] . "
<img src='/images/icons/delete.png' alt='delete' class='delete' id='" . $menu['id'] . "' height='20px' width='20px' style='float: right ;margin:-20px auto;z-index:99999'>
<img src='/images/icons/edit.png' alt='Edit' class='edit' id='" . $menu['id'] . "' height='20px' width='20px' style='float: right ;'> 
</li>";

                }
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
        $this->validate($request, [
            'name' => 'required',
            'active' => 'required',

        ]);

        $formInput["url"] = "/" . mb_strtolower($request->name);

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
        $res = Menu::find($id);
        $parent_id = Menu::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view("admin.menu.edit", ["res" => $res, "parent_id" => $parent_id, 'categories' => $categories]);
    }

    public function updateMenu(Request $req, $id)
    {
        $menu = new Menu();
        $this->validate($req, [
            'name' => 'required',

        ]);
        $data = [
            'name' => $req["name"],
            "parent_id" => $req["parent_id"],
            "url" => $req["url"],
            "category_id" => $req["category_id"],
            "active" => $req["active"]
        ];
        $res = $menu->where('id', $id)->update($data);
        if ($res) {
            return redirect()->route('menu.index');

        }

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


        $req = $request["data"];
        foreach ($req as $dat) {
            $menu = new Menu();
            $data = ['orders' => $dat['order'], 'parent_id' => $dat['pId']];
            $res = $menu->where('id', $dat['id'])->update($data);

        }
        if ($res == 1) {
            echo json_encode(["data" => "Successfully saved"]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Menu::destroy($id);
        echo json_encode(["data" => "Successfully saved"]);
    }
}
