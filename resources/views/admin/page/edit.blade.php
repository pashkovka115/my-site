@extends('admin.layouts.default')

@section('title')
    Редактируем "{{ $item->name }}"
@endsection
@section('page_header')
    Редактируем "{{ $item->name }}"
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">
        <a href="{{ route('admin.page.create') }}" class="btn btn-outline-success mb-2"><i
                    class="bi bi-plus-circle"></i></a>
        @include('admin.parts.modal_settings_tabs', ["route" => "admin.page.tab.update", 'route_store' => 'admin.page.tab.store'])
        @include('admin.parts.modal_settings_columns', ["route" => "admin.page.columns.update"])
    </div>
    @php //dd($item, $columns) @endphp
    <div class="py-2">
        <form action="{{ route('admin.page.update', ['id' => $item->id]) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @include('admin.parts.form_with_tabs_for_edit')
        </form>
    </div>
@endsection

@section('script_buttom')
    @parent
@endsection
