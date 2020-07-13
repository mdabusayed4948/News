<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OldCategoryController extends Controller
{

    public function index(){

        return view('admin.category_old.list');

    }

    public function create(){

    	return view('admin.category_old.create');

    }

    public function edit(){

    	return view('admin.category_old.edit');

    }
    
}
