{{--@extends('admin.layouts.default')--}}

{{--@section('title')--}}
Редактируем сообщение
@endsection
@section('page_header')
    Редактируем сообщение
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">

        @include('admin.parts.modal_settings_columns', ["route" => "admin.feedback.columns.update"])
        {{--		@include('admin.parts.modal_add_additional_fields', ['field' => 'feedback_id', 'id' => $item->id, 'route' => 'admin.feedback.additional_fields.store'])--}}
    </div>
    <div class="py-2">
        <form action="{{ route('admin.feedback.update', ['id' => $item->id]) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @include('admin.parts.form_with_tabs_for_edit')
        </form>
    </div>
@endsection

@section('script_buttom')
    @parent
@endsection
