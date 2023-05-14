<div class="col">
    <div class="header-navigation-area">
        <ul class="main-menu nav">
            @foreach($menu->items as $item)
                <li class="has-submenu"><a href="{{ $item->slug }}"><span>{{ $item->name }}</span></a>
                    @if($item->children->count() > 0)
                        <ul class="submenu-nav">
                            @include('site.mycomponents.submenu', ['item' => $item])
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
