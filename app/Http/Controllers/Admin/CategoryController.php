<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\category\CreateCategoryRequest;
use App\Http\Requests\Admin\category\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Category List';
        $data = Category::all();
        return view('admin.category.list', compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Category Create';
        return view('admin.category.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:categories,name',
//        ], [
//            'name.required' => 'Name Field is Required',
//            'name.unique'     => 'This Category Already Exist.',
//        ]);

        $category = new Category();
        $category->name = ucwords($request->name);
        $category->status = 1;
        $category->save();
        return redirect()->action('Admin\CategoryController@index')->with('message','Category Successfully Created.');
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
        $page_name = 'Category Edit';
        $category  = Category::find($id);
        return view('admin.category.edit', compact('category','page_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:categories,name,'.$id,
//        ], [
//            'name.required' => 'Name Field is Required',
//            'name.unique'     => 'This Category Already Exist.',
//        ]);

        $category = Category::find($id);
        $category->name = ucwords($request->name);
        $category->save();
        return redirect()->action('Admin\CategoryController@index')->with('message','Category Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->action('Admin\CategoryController@index')->with('message','Category Successfully Deleted.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $category = Category::find($id);
        if($category->status === 1){
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        $category->save();
        return redirect()->action('Admin\CategoryController@index')->with('message','Category Status Successfully Changed.');
    }
}
