@extends('admin.layouts.default')

@section('title')
  Редактируем роль
@endsection
@section('page_header')
  Редактируем роль
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
  <!-- content -->
  <div class="line">
    <!-- Modal -->
  </div>

  <div class="py-2">
    <form action="{{ route('admin.role.update', ['id' => $role->id]) }}" method="post">
      @csrf
      <div class="row">

        <div class="col-12 mb-1">
          <div class="card">
            <div class="card-body">
              <div class="">
                <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="Роль">
                <input type="hidden" name="guard_name" value="web" placeholder="guard">
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 mb-5">
          <div class="card">
            <div class="card-body">
              @foreach($permissions as $permission)
                <div class="form-check " title="{{ $permission->name }}">
                  <input type="checkbox"
                         name="perms[]"
                         value="{{ $permission->name }}"
                         class="form-check-input"
                         id="{{ $permission->name }}"
                         @checked($role->hasPermissionTo($permission->name))
                  >
                  <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->description }}</label>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        @include('admin.parts.buttons_three')
      </div>
    </form>
  </div>
@endsection

@section('script_buttom')
  @parent
@endsection
