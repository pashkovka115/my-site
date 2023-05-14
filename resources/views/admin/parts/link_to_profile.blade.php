@if(auth()->user()->avatar)
<a class="rounded-circle" href="#" role="button" id="dropdownUser"
   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="avatar avatar-md avatar-indicators avatar-online">
        <img alt="avatar" src="/storage/{{ auth()->user()->avatar }}"
             class="rounded-circle"/>
    </div>
</a>
@endif
<div class="dropdown-menu dropdown-menu-end"
     aria-labelledby="dropdownUser">
    <div class="px-4 pb-0 pt-2">
        <div class="lh-1 ">
            <h5 class="mb-1"> {{ auth()->user()->name }}</h5>
        </div>
        <div class=" dropdown-divider mt-3 mb-2"></div>
    </div>

    <ul class="list-unstyled">
        <li>
            <a class="dropdown-item" href="{{ route('admin.user.edit', ['id' => auth()->id()]) }}">
                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>
                Редактировать профиль
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>
                Выйти
            </a>
        </li>
    </ul>
</div>
