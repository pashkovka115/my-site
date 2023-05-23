@extends('site.layouts.default')

@section('breadcrumbs')
  @php
    $name_lavel = $item->name_lavel
  @endphp
  @section('window_title'){{ $item->title }}@endsection
  @section('meta_keywords'){{ $item->meta_keywords }}@endsection
  @section('meta_description'){{ $item->meta_description }}@endsection
  @section('page_title'){{ $item->name }}@endsection


  @section('breadcrumb')
    @php $breads = [
    route('site.home') => 'Главная',
    '' => 'Контакты',
] @endphp
  @endsection

@endsection

@section('content')
  <section class="shipping-policy-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-8 m-auto">
          <div class="product-shipping-policy">
            {!! $item->description !!}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
