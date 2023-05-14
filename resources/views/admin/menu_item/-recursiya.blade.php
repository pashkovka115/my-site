<?php if (!isset($num)) {
    static $num = 1;
} else {
    $num++;
} ?>
@if($num == 1)
    {{--	<ol class="serialization vertical">--}}
@else
    {{--	<ol>--}}
@endif

@foreach($items as $item)
    <li
        data-id="{{ $item->id }}"
        data-name="{{ $item->name }}"
        data-slug="{{ $item->slug }}"
        data-parent_id="{{ $item->parent_id }}"
        data-menu_id="{{ $item->menu_id }}"
        class="menu-item-bar">
        <span class="move-icon"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-move"><polyline
                    points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline
                    points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2"
                                                                                                              y1="12"
                                                                                                              x2="22"
                                                                                                              y2="12"></line><line
                    x1="12" y1="2" x2="12" y2="22"></line></svg></span>
        {{ $item->name }}
        <ol data-id="0" data-parent_id="0">
            @if($item->children->count())
                @include('admin.menu_item.-recursiya', ['items' => $item->children, 'num' => $num])
            @else
                <p style="float: right; margin-top: -23px;">
                    <a href="{{ route('admin.menu_item.destroy', ['id' => $item->id]) }}">Удалить <b>{{ $item->name }}</b></a>
                </p>
            @endif
        </ol>
    </li>
@endforeach
{{--	</ol>--}}
