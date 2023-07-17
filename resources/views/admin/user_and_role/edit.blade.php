@extends('admin.layouts.default')

@section('title')
  Пользователи и их роли
@endsection
@section('page_header')
  Пользователи и их роли
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
  <!-- content -->
  <div class="line">
    <!-- Modal -->
  </div>

  <div class="py-2">
    <form action="{{ route('admin.user_and_role.update', ['id' => $user->id]) }}" method="post">
      @csrf
      <div class="row">

        <div class="col-12 mb-1">
          <div class="card">
            <div class="card-body">
              <div class="">
                <input type="text"
                       name="name"
                       value="{{ $user->name }}"
                       class="form-control"
                       placeholder="Пользователь"
                       readonly
                >
                {{--                <input type="hidden" name="guard_name" value="web" placeholder="guard">--}}
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 mb-5">
          <div class="card">
            <div class="card-body">
              @foreach($roles as $role)
                <div class="form-check " title="{{ $role->name }}">
                  <input type="checkbox"
                         name="roles[]"
                         value="{{ $role->name }}"
                         class="form-check-input"
                         id="{{ $role->id }}"
                      @checked($user->hasRole($role->name))
                  >
                  <label class="form-check-label" for="{{ $role->id }}">{{ $role->name }}</label>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        @include('admin.parts.buttons_three', ['new_button' => false])
      </div>
    </form>
  </div>
@endsection

@section('script_buttom')
  @parent
@endsection
