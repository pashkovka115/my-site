@extends('site.layouts.default')

@section('breadcrumbs')
	@php
		$name_lavel = $page_item->name_lavel
	@endphp

	@section('window_title')
		{{ $page_item->title }}
	@endsection

	@section('page_title')
		{{ $page_item->name }}
	@endsection

	@section('name_lavel')
	@endsection

	@section('breadcrumb')
		@php $breads = [
    route('site.home') => 'Главная',
    '' => 'Контакты',
] @endphp
	@endsection

@endsection

@section('content')
	<!--== Start Page Area Wrapper ==-->
	<section class="contact-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="contact-info">

						@foreach($page_item->additionalFields as $prop)
							@if($prop->is_show == 1 and $prop->key != 'form_title' and $prop->key != 'form_brief')
							<div class="info-item">
								<div class="info">
										<h4 class="title">{{ $prop->name }}</h4>
										<p>{!! $prop->value !!}</p>
								</div>
							</div>
							@endif
						@endforeach

					</div>
				</div>
				<div class="col-lg-7">
					<!--== Start Page Form ==-->
					<div class="contact-form">
						<!-- key title: form_title -->
						@foreach($page_item->additionalFields as $prop)
							@if($prop->key == 'form_title' and $prop->is_show == 1)
								<h4 class="contact-form-title">{{ $prop->name }}</h4>
								@break
							@endif
						@endforeach
						<!-- key brief: form_brief -->
						@foreach($page_item->additionalFields as $prop)
							@if($prop->key == 'form_brief' and $prop->is_show == 1)
									<p class="desc">{{ $prop->name }}</p>
								@break
							@endif
						@endforeach

						<form id="contact-form" action="{{ route('site.feedback.store') }}" method="post">
							@csrf
							<div class="row row-gutter-20">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="text" name="name" placeholder="Имя" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="email" name="email" placeholder="Email" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="description" placeholder="Сообщение" required></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<button class="btn btn-theme" type="submit">Отправить</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!--== End Page Form ==-->

					<!--== Message Notification ==-->
					<div class="form-message"></div>
				</div>
			</div>
		</div>
	</section>
	<!--== End Page Area Wrapper ==-->

@endsection
