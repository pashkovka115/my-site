@extends('admin.layouts.default')

@section('title')
	Новый пользователь
@endsection
@section('page_header')
	Новый пользователь
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
	</div>

	<div class="py-2">
		<form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">

                <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <input type="text" name="name" class="form-control" placeholder="Имя"><br>
                                <input type="text" name="email" class="form-control" placeholder="Email"><br>
                                <input type="password" name="password" class="form-control" placeholder="Пароль"><br>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите пароль"><br>
                                <input type="file" name="avatar" class="form-control">
                            </div>
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
