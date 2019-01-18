<?php

namespace App\Http\Controllers;
use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {

        $about = About::all();

        return view('admin.about.index', ["abouts" => $about]);
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
        $about=About::find($id);
        return view("admin.about.edit",['about'=>$about]);

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
            'description' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $imageName = $image->getClientOriginalName();
            $path = "images/about/";
            $image->move($path, $imageName);
            $data['image'] = $imageName;

        }

        $product = About::find($id);
        $product->fill($data);
        $product->save();
        return redirect()->route('admin.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delete = new About();
        $res = $delete->where('id', $id)->delete();
        return redirect()->route('about.index');
    }
}
