@extends('admin.layouts.default')

@section('title')
Редактируем сообщение
@endsection
@section('page_header')
    Редактируем сообщение
@endsection

@section('content')
    <div class="line">
        @include('admin.parts.modal_settings_tabs', ["route" => "admin.feedback.tab.update", 'route_store' => 'admin.feedback.tab.store'])
        @include('admin.parts.modal_settings_columns', ["route" => "admin.feedback.columns.update"])
    </div>
    <div class="py-2">
        <form action="{{ route('admin.feedback.update', ['id' => $item->id]) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @include('admin.parts.form_with_tabs_for_edit', ['new_button' => false])
        </form>
    </div>
@endsection
