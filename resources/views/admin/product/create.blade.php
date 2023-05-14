@extends('admin.layouts.default')

@section('title')
	Новый товар
@endsection
@section('page_header')
	Новый товар
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line"></div>
	<div class="py-2">
		<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@include('admin.parts.form_edit')
			@include('admin.parts.buttons_three')
		</form>
	</div>
@endsection
