@extends('admin.layouts.default')

@section('title')
	Новая страница
@endsection
@section('page_header')
	Новая страница
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line"></div>

	<div class="py-2">
		<form action="{{ route('admin.page.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@include('admin.parts.form_edit')
			@include('admin.parts.buttons_three')
		</form>
	</div>
@endsection

@section('script_buttom')
    @parent
@endsection
