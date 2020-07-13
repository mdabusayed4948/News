<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\author\CreateAuthorRequest;
use App\Http\Requests\Admin\author\UpdateAuthorRequest;
use App\User;
use App\Role;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Authors List';
        $data = User::where('type', 2)->get();
        return view('admin.author.list', compact('data','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Create Author';
        $roles = Role::pluck('name', 'id');
        return view('admin.author.create', compact('page_name','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAuthorRequest $request)
    {
//        $this->validate($request,[
//            'name'     => 'required',
//            'email'    => 'required|email|unique:users,email',
//            'password' => 'required|size:6',
//            'roles'    => 'required|array',
//            'roles.*'  => 'required|string',
//        ],[
//            'name.required'    => 'Name Field is Required.',
//            'email.email'      => 'Invalide Email Format.',
//            'email.unique'     => 'User Email Already Exist.',
//            'password.size'    => 'Password Must Be 6 Characters or More.',
//            'roles.required'   => 'You must select Roles.',
//            'roles.*.required' => 'You must select a Roles.',
//        ]);

        $author = new User();

        $author->name     = $request->name;
        $author->email    = $request->email;
        $author->password = Hash::make($request->password);
        $author->type     = 2;

        $author->save();

        foreach ($request->roles as $value) {

            $author->attachRole($value);
            
        }

        return redirect()->action('Admin\AuthorController@index')->with('message','Author Successfully Created.');
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
        $page_name = 'Author Edit';
        $author = User::find($id);
        $roles = Role::pluck('name','id');
        $selectedRoles = DB::table('role_user')->where('user_id', $id)->pluck('role_id')->toArray();
        
        return view('admin.author.edit', compact('page_name','author','roles','selectedRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
//        $this->validate($request,[
//            'name'     => 'required',
//            'email'    => 'required|email|unique:users,email,'.$id,
//            'password' => 'required|size:6',
//            'roles'    => 'required|array',
//            'roles.*'  => 'required|string',
//        ],[
//            'name.required'    => 'Name Field is Required.',
//            'email.email'      => 'Invalide Email Format.',
//            'email.unique'     => 'User Email Already Exist.',
//            'password.size'    => 'Password Must Be 6 Characters or More.',
//            'roles.required'   => 'You must select Roles.',
//            'roles.*.required' => 'You must select a Roles.',
//        ]);

        $author = User::find($id);

        $author->name     = $request->name;
        $author->email    = $request->email;
        $author->password = Hash::make($request->password);

        $author->save();
        DB::table('role_user')->where('user_id', $id)->delete();

        foreach ($request->roles as $value) {

            $author->attachRole($value);

        }

        return redirect()->action('Admin\AuthorController@index')->with('message','Author Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();


        return redirect()->action('Admin\AuthorController@index')->with('message','Author Successfully Deleted.');
    }
}
