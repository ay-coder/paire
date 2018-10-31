<div class="page-wrapper @yield('pageWraper')">
    {{--@include('includes.admin.breadCrumb')--}}
    @include('includes.notification')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@yield('card-title')</h4>
                    </div>
                    <hr class="m-t-0">
                    @yield('admin.content')
                </div>
                {{--<div class="card">
                    <div class="card-body">
                        This is some text within a card block.

                    </div>
                </div>--}}
            </div>
        </div>
    </div>

