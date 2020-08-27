<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return CategoryResource::collection($categories);
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
        'name' => 'required|string',
        'photo' => 'required|mimes:jpeg,bmp,png',
        ]);

         //File Upload
        $imageName = time().'.'.$request->photo->extension(); 
         
        $request->photo->move(public_path('backendtemplate/categoryimg'), 
            $imageName);

        $myfile='backendtemplate/categoryimg/'.$imageName;


        //Store Data
          $category=new Category;
          $category->name=$request->name;
          $category->photo=$myfile;
          

          $category->save();


        //Redirect
          return new CategoryResource($category);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
