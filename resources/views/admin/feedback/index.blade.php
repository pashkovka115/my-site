@extends('admin.layouts.default')

@section('title')
	Сообщения
@endsection
@section('page_header')
	Сообщения
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
		@include('admin.parts.modal_settings_columns', ['route' => 'admin.feedback.columns.update'])
		<!-- End Modal -->
		<a href="{{ route('admin.feedback.create') }}" class="btn btn-outline-success mb-2"><i
					class="bi bi-plus-circle"></i></a>
	</div>
	@include('admin.parts.index_template', ['link_view' => false, 'route_name' => 'feedback'])
@endsection

@section('script_buttom')
    @parent
@endsection
