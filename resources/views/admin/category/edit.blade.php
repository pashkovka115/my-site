{{--@extends('admin.layouts.default')--}}

@section('title')
    Редактируем категорию
@endsection
@section('page_header')
    Редактируем категорию
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">
        <a href="{{ route('admin.category_product.create') }}" class="btn btn-outline-success mb-2"><i
                class="bi bi-plus-circle"></i></a>
        @include('admin.parts.modal_settings_tabs', ["route" => "admin.category_product.tab.update", 'route_store' => 'admin.category_product.tab.store'])
        <!-- Modal -->
        @include('admin.parts.modal_settings_columns', ['route' => 'admin.category_product.columns.update'])
        <!-- End Modal -->
        {{--		@include('admin.parts.modal_add_additional_fields', ['field' => 'category_id', 'id' => $item->id, 'route' => 'admin.category_product.additional_fields.store'])--}}
    </div>
    <div class="py-2">
        <form action="{{ route('admin.category_product.update', ['id' => $item->id]) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @include('admin.parts.form_with_tabs_for_edit')
        </form>
    </div>
@endsection

@section('script_buttom')
    @parent
@endsection
