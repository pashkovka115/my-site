@extends('admin.layouts.default')

@section('title')
    Страницы
@endsection
@section('page_header')
    Страницы
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">
        <!-- End Modal -->
        <a href="{{ route('admin.page.create') }}" class="btn btn-outline-success mb-2"><i
                class="bi bi-plus-circle"></i></a>
        <!-- Modal -->
        @include('admin.parts.modal_settings_columns', ['route' => 'admin.page.columns.update'])
    </div>
    @include('admin.parts.index_template', ['link_view' => true, 'route_name' => 'page'])
@endsection

@section('script_buttom')
    @parent
@endsection
