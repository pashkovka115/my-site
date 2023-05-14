@extends('admin.layouts.default')

@section('title')
	Новое сообщение
@endsection
@section('page_header')
	Новое сообщение
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
		{{--        @include('admin.parts.modal_settings_columns')--}}
		<!-- End Modal -->
	</div>

	<div class="py-2">
		<form action="{{ route('admin.feedback.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@include('admin.parts.form_edit')
			@include('admin.parts.buttons_three')
		</form>
	</div>
@endsection

@section('script_buttom')
    @parent
@endsection
