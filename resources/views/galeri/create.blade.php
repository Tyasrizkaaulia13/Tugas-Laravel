@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Tambah Galeri</div>

	                <div class="card-body">
	                	{!! Form::open(['route' => 'galeri.store', 'method' => 'post']) !!}
	                	@include('galeri.form')
	                	{!! Form::close() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection