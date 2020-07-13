<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;

class DbController extends Controller
{

	public function index(){

		//$all = DB::table('employees')->select('name','age','city')->get();
		//$all = DB::table('employees')->pluck('email','city');
		//$single = DB::table('employees')->first();
		//$order = DB::table('employees')->orderBy('id','ASC')->get();
		//$limit = DB::table('employees')->orderBy('id','DESC')->limit(2)->get();
		//$count = DB::table('employees')->count();
		//$offset = DB::table('employees')->orderBy('salary','DESC')->offset(2)->limit(1)->get();
		$min = DB::table('employees')->max('salary');
		dd($min);

	} 

	public function joining(){

		$result = DB::table('order')
				->join('user','user.id','=','order.user_id')
				->select('user.name','order.id','order.amount','order.order_date')
				->where('status', 1)
				->get();

		dd($result);		

	}

	public function model(){

		$result = Employee::all();
		dd($result);

	}

}

