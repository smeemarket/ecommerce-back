<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watch = Watch::orderBy('id', 'desc')
            ->with('category')
            ->paginate(2);
        return view('watch.index', compact('watch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('watch.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg,webp,jpeg',
            'price' => 'required',
            'description' => 'required'
        ]);


        //image upload
        $file = $request->file('image');
        $file_name = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);

        //store db
        Watch::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $file_name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Watch Created Success..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $watch = Watch::where('id', $id)->with('category')->first();
        return view('watch.edit', compact('category', 'watch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $watch = Watch::where('id', $id);
        //if user choose file
        if ($request->file('image')) {
            File::delete(public_path('images/' . $watch->first()->image));
            $file = $request->file('image');
            $file_name = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $file_name);
        } else {
            $file_name = $watch->first()->image;
        }

        $watch->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $file_name,
        ]);
        return redirect()->back()->with('success', 'Product Updated...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watch = Watch::where('id',$id);
        File::delete(public_path('images/'.$watch->first()->image));
        $watch->delete();
        return redirect()->back()->with('success', 'Product Deleted!');
    }
}