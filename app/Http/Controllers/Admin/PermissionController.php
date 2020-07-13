<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\permission\CreatePermissionRequest;
use App\Http\Requests\Admin\permission\UpdatePermissionRequest;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Permission List';
        $data = Permission::all();
        return view('admin.permission.list', compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Create Permission';
        return view('admin.permission.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            ], [
//               'name.required' => 'Name Field is Required',
//           ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        
        $permission->save();
        return redirect()->action('Admin\PermissionController@index')->with('message','Permission Successfully Created.');
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
        $page_name = 'Permission Edit';
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('page_name','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            ], [
//               'name.required' => 'Name Field is Required',
//               'name.alpha_num' => 'Name field accepts alpha numeric characters',
//           ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        return redirect()->action('Admin\PermissionController@index')->with('message','Permission Successfully Updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect()->action('Admin\PermissionController@index')->with('message','Permission Successfully Deleted.');
    }
}
