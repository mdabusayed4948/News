@extends('master')

@section('sidebar')

  @parent

  <p>This About Sidebar</p>

@endsection

@section('component')

	<h2>About Us Page</h2>

	@php

	 $name = 'proSayed';

	 echo $name;

	@endphp

@endsection