@extends('admin.layouts.default')

@section('title')
	Новая категория
@endsection
@section('page_header')
	Новая категория
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line"></div>

	<div class="py-2">
		<form action="{{ route('admin.category_product.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@include('admin.parts.form_edit')
			@include('admin.parts.buttons_three')
		</form>
	</div>
@endsection

@section('script_buttom')
    @parent
@endsection
