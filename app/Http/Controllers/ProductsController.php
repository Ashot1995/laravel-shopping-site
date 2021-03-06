<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('order')->get();
        return view("admin.product.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view("admin.product.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request["image"];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        $image_name = time() . '.png';
        $path = public_path() . "/images/product" . $image_name;
        $path1 = "product" . $image_name;

        $formInput['name'] = $request["name"];
        $formInput['description'] = $request["description"];
        $formInput['price'] = $request["price"];
        $formInput['category_id'] = $request["category_id"];
        $formInput['image'] = $path1;

        $res = Product::create($formInput);
        if ($res) {
            file_put_contents($path, $data);
            return json_encode(["data" => "ok"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $res = Category::with('products')->get()->toArray();
        $categories = Category::pluck('name', 'id');
        return view("admin.product.edit", ['products' => $products, "categories" => $res]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->except("_token");

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $data['image'] = $imageName;

        }

        $product = Product::find($id);
        $product->fill($data);
        $product->save();
        return redirect()->route('product.index');

    }

    public function updateSortable(Request $req)
    {
        $product = new Product();
        foreach ($req["data"] as $dat) {

            $data = ['order' => $dat['order'], 'id' => $dat['id']];
            $res = $product->where('id', $dat['id'])->update($data);

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
        $delete =Product::where("id",$id)->get();
$path="images/".$delete[0]['image'];

       if(file_exists($path)){
           File::delete($path);
       }
       Product::destroy($id);
        return redirect()->route('product.index');
    }
}
