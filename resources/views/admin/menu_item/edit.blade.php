@extends('admin.layouts.default')

@section('title')
    Редактируем пункты меню
@endsection
@section('page_header')
    Редактируем пункты меню "{{ $menu->name }}"
@endsection

@section('style_top')
    <style>
        .menu-item-bar {
            background: #eee;
            padding: 5px 10px;
            border: 1px solid #d7d7d7;
            margin-bottom: 5px;
            width: 100%;
            cursor: move;
            display: block;
        }

        .dragged {
            position: absolute;
            z-index: 1;
        }

        body.dragging, body.dragging * {
            cursor: move !important;
        }
    </style>
@endsection

@section('content')
    <div class="line">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addLinkToMenu">
            Добавить пункт меню
        </button>
    </div>
    <div class="py-2">

        <div class="row">
            <div class="col-12 mb-1">
                <div class="card">
                    <div class="card-body category-product-property">
                        {{--	data-id="0" data-parent_id="0" - нужно для коректной работы сортировки НЕ УДАЛЯТЬ!!!					--}}
                        <ol id="menuitems" class="menu ui-sortable" data-id="0" data-parent_id="0">
                            @include('admin.menu_item.-recursiya')
                        </ol>
                        <form action="{{ route('admin.menu_item.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="input_menu_json" value="" id="input_menu_json">
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="submit" id="btn_save_json" class="btn btn-outline-success" value="Сохранить" disabled>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-1">
                <div class="card">
                    <div class="card-body category-product-property">
                        <h5 class="card-title">Существующие ссылки</h5>
                        @foreach($links as $link)
                        <p class="badge bg-dark-info">{{ $link }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- Для отладки --}}
        {{--<div class="row">
            <div class="col-12 mb-1">
                <div class="card">
                    <div class="card-body category-product-property">
                        <pre id="serialize_output2"></pre>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addLinkToMenu" tabindex="-1" role="dialog" aria-labelledby="addLinkToMenuTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLinkToMenuTitle">Новый пункт меню</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form action="{{ route('admin.menu_item.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <input type="hidden" name="parent_id" value="0">
                    <div class="modal-body">
                        <div class="card-body category-product-property">
                            <label class="form-label" title="Произвольно">Якорь
                                <input type="text" name="name" class="form-control" value="">
                            </label>
                            <br>
                            <label class="form-label" title="Произвольно">Ссылка
                                <input type="text" name="slug" class="form-control" value="">
                            </label>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script_buttom')
    @parent
    <script src="{{ url('assets/admin/js/jquery-sortable.js')}}"></script>
    <script>
        $(function () {
            let global_selector = '#menuitems';

            var group = $(global_selector).sortable({
                group: 'serialization',
                delay: 500,
                onDrop: function ($item, container, _super) {

                    let parent_container;

                    setTimeout(function () {
                        parent_container = $item.parent().parent();
                        if (parent_container.prop('tagName') !== 'LI') {
                            parent_container = $item.parent();
                        }
                        $item.attr('data-parent_id', parent_container.attr('data-id'));

                        let arr = [];
                        function toJSON(node) {
                            if (node.tagName === 'OL' || node.tagName === 'UL' || node.tagName === 'LI') {
                                let obj = {};
                                if (node.tagName === 'LI') {
                                    for (let key in node.dataset) {
                                        if (key === 'id') {
                                            obj.id = node.dataset.id;
                                        } else if (key === 'parent_id') {
                                            obj.parent_id = node.dataset.parent_id;
                                        } else if (key === 'menu_id') {
                                            obj.menu_id = node.dataset.menu_id;
                                        } else if (key === 'slug') {
                                            obj.slug = node.dataset.slug;
                                        } else if (key === 'name') {
                                            obj.name = node.dataset.name;
                                        }
                                    }
                                    arr.push(obj);
                                }

                                let children = node.childNodes;
                                for (let i = 0; i < children.length; i++) {
                                    if (children[i].nodeType === 1) {
                                        let item = toJSON(children[i]);
                                        if (item !== undefined) {
                                            arr.push(item);
                                        }
                                    }
                                }
                            }
                        }

                        let btn_save_json = document.querySelector('#btn_save_json');
                        btn_save_json.removeAttribute('disabled');
                        let global_container = document.querySelector(global_selector);
                        toJSON(global_container);

                        // JSON для отправки в БД
                        let jsonString = JSON.stringify(arr, null, ' ');
                        document.querySelector('#input_menu_json').setAttribute('value', jsonString);
                        // $('#serialize_output2').text(jsonString);

                    }, 300);
                    // sleep(500);

                    /*var jsonString = JSON.stringify(data, null, ' ');
                    $('#serialize_output2').text(jsonString);*/
                    _super($item, container);
                }
            });
        });
    </script>
@endsection
