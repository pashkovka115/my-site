@extends('admin.layouts.default')

@section('title') Admin - Главная @endsection
@section('page_header') Главная @endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
<!-- content -->
<div class="py-6">
    <!-- row -->
    <div class="row">
        <div>
            {{--<div class="mb-10 card">
            </div>--}}
            <div class="mb-10 card">
                <ul class="nav nav-line-bottom nav-example" id="pills-tabTwo" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-accordions-design-tab" data-bs-toggle="pill"
                           href="#pills-accordions-design" role="tab" aria-controls="pills-accordions-design"
                           aria-selected="true">Tab1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-accordions-html-tab" data-bs-toggle="pill"
                           href="#pills-accordions-html" role="tab" aria-controls="pills-accordions-html"
                           aria-selected="false">Tab2</a>
                    </li>
                </ul>
                <div class="tab-content p-4" id="pills-tabTwoContent">
                    <div class="tab-pane tab-example-design fade show active" id="pills-accordions-design"
                         role="tabpanel" aria-labelledby="pills-accordions-design-tab">
                        Content Tab1
                    </div>
                    <div class="tab-pane tab-example-html fade" id="pills-accordions-html" role="tabpanel"
                         aria-labelledby="pills-accordions-html-tab">
                        Content Tab2

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_buttom')
    @parent
@endsection
