<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin.product.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadProductRequest $request)
    {
        //
        $imgNameWithExt=$request->file('picture')->getClientOriginalName();
        //get file name
        $imgname=pathinfo($imgNameWithExt,PATHINFO_FILENAME);
        //get extension
        $extensionimg = $request->file('picture')->getClientOriginalExtension();
        //file name to store
        $imgNameToStore=$imgname.'_'.time().'.'.$extensionimg;

        $goods = new Product();
        $goods->user_id=Auth::guard('admin')->user()->id;
        $goods->name=$request->input('name');
        $goods->color=$request->input('color');
        $goods->description=$request->input('description');
        $goods->specification=$request->input('spec');
        $goods->price=$request->input('price');
        $goods->discount=$request->input('discount');
        $goods->picture=$imgNameToStore;
        $goods->ratings=1;
        $goods->category_id=$request->input('cat_id');
        $goods->qty=$request->input('qty');
        $goods->save();
        $request->file('picture')->storeAs('public/product/'.$goods->id.'/', $imgNameToStore);
        return back()->with('success','Uploading of Goods Successful');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
