<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Good $good)
    {
        //
        return view('goods.index')->with('goods',auth()->user()->goods()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category,Brand $brand)
    {
        //
        $categories=$category->all()->pluck('name','id')->toArray();
        $brand=$brand->all()->pluck('name','id')->toArray();
        return view('goods.create',compact('categories'),compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        if(isset($input['image'])){
            $img = $input['image'];
            $input['image']='';
            $filepath ='/Image/'.implode('', explode(' ', $img->getClientOriginalName()));
            $path = public_path('Image');
            $filename= implode('', explode(' ', $img->getClientOriginalName()));
            $img->move($path,$filename);
            $input['image']=$filepath;
        }else{
            $input['image']='';
        }
        //dd($input);
        auth()->user()->goods()->create($input);
        return redirect(route('goods.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good,Category $category,Brand $brand)
    {
        //
        $categories=$category->all()->pluck('name','id')->toArray();
        $brand=$brand->all()->pluck('name','id')->toArray();
        return view('goods.edit',compact('categories'),compact('brand'))->with('good',$good);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
        //
        $input = $request->all();
        if(isset($input['image'])){
            $img = $input['image'];
            $input['image']='';
            $filepath ='/Image/'.implode('', explode(' ', $img->getClientOriginalName()));
            $path = public_path('Image');
            $filename= implode('', explode(' ', $img->getClientOriginalName()));
            $img->move($path,$filename);
            $input['image']=$filepath;
        }
        //dd($input);
        $good->update($input);
        return redirect(route('goods.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        //
        if(isset($good->image)){
            File::delete(public_path().'/'.$good->image);
        }
        $good->delete();
        return redirect(route('goods.index'));
    }
}
