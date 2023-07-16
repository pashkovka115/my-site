@extends('admin.layouts.default')

@section('title')
    Новое разрешение
@endsection
@section('page_header')
    Новое разрешение
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
        <form action="{{ route('admin.permission.store') }}" method="post">
            @csrf
            <div class="col-12 mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="Разрешение"
                            ><br>
                            <input type="text"
                                   name="description"
                                   class="form-control"
                                   value="{{ old('description') }}"
                                   placeholder="Описание разрешения"
                            >
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.parts.buttons_three')
        </form>
    </div>
@endsection

@section('script_buttom')
    @parent
@endsection
