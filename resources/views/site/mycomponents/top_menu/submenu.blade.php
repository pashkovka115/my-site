@foreach($item->children as $child)
    @if($child->children->count() > 0)
        <li class="has-submenu"><a href="{{ $child->slug }}">{{ $child->name }}</a>
    @else
        <li><a href="{{ $child->slug }}">{{ $child->name }}</a>
            @endif

            @if($child->children->count() > 0)
                <ul class="submenu-nav">
                    @include('site.mycomponents.top_menu.submenu', ['item' => $child])
                </ul>
            @endif
        </li>
        @endforeach
