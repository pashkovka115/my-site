@include('admin.parts.head')
<div id="db-wrapper">
    <!-- navbar vertical -->
    <!-- Sidebar -->
    @include('admin.parts.left_bar')
    <!-- page content -->
    <div id="page-content">
        <div class="header @@classList">
            <!-- navbar -->
            <nav class="navbar-classic navbar navbar-expand-lg">
                <a id="nav-toggle" href="#"><i
                        data-feather="menu"

                        class="nav-icon me-2 icon-xs"></i></a>
                <div class="ms-lg-3 d-none d-md-none d-lg-block">
                    <!-- Form -->
                    <form class="d-flex align-items-center">
                        <input type="search" name="search" class="form-control" placeholder="Search"/>
                    </form>
                </div>
                <!--Navbar nav -->
                <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
                    <li class="dropdown stopevent">
                        @include('admin.parts.notifications_top_bar')
                    </li>
                    <li class="dropdown ms-2">
                        @include('admin.parts.link_to_profile')
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Container fluid -->
        <div class="container-fluid p-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="border-bottom pb-4 mb-4 ">
                        <h3 class="mb-0 fw-bold">@yield('page_header')</h3>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
@include('admin.parts.footer')
