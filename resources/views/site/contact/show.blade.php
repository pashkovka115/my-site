@extends('site.layouts.default')

@section('breadcrumbs')
    @section('window_title')
        Контакты
    @endsection

    @section('page_title')
        Контакты
    @endsection

    @section('breadcrumb')
        @php
            $breads = [
    route('site.home') => 'Главная',
    '' => 'Контакты',
]
        @endphp
    @endsection

@endsection

@section('content')
    <!--== Start Page Area Wrapper ==-->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-info">
                        <div class="info-item">
                            <div class="info">
                                <h4 class="title">Адрес мастерской</h4>
                                <p>Россия, г. Краснодар, <br>ул. Пролетарская, 115/1</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info">
                                <h4 class="title">Телефон</h4>
                                <a href="tel:+79284295483">+7 (928) 429 54 83</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <!--== Start Page Form ==-->
                    @include('site.parts.form_feedback')
                    <!--== End Page Form ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Area Wrapper ==-->

@endsection
