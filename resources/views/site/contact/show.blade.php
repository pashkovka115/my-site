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
                    <div class="contact-form">
                        <h4 class="contact-form-title">Напишите мне!</h4>
                        <p class="desc">Здесь Вы можете написать мне по любомому поводу.</p>
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
                                        <input class="form-control" type="email" name="email" placeholder="Email"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" placeholder="Сообщение"
                                                  required></textarea>
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
