@extends('admin.layouts.default')

@section('title')
    Редактируем пользователя {{ $item->email }}
@endsection
@section('page_header')
    Редактируем разрешение
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">
        <!-- Modal -->
        {{--		@include('admin.parts.modal_settings_columns', ['route' => 'admin.category_product.columns.update'])--}}
        <!-- End Modal -->
        {{--		@include('admin.parts.modal_add_property', ['field' => 'category_id', 'id' => $item->id, 'route' => 'admin.category_product.property.store'])--}}
    </div>
    <div class="py-2">
        <form action="{{ route('admin.permission.update', ['id' => $item->id]) }}" method="post">
            @csrf
            <div class="col-12 mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <input type="text" name="name" class="form-control" value="{{ $item->name }}" readonly><br>
                            <input type="text" name="description" class="form-control" value="{{ $item->description }}">

                        </div>
                    </div>
                </div>
            </div>
            @include('admin.parts.buttons_three', ['new_button' => false])
        </form>
    </div>
@endsection

@section('script_buttom')
    @parent
@endsection
