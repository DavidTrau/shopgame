@extends('admin.layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('admin.layouts.components.slidebar')
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

            @include('admin.layouts.components.topbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Thông tin</h1>
                </div>
                @if(Auth::guard('admin')->user()->is_super == 1)
                    @include('admin.components.admin')
                @else
                    @include('admin.components.ctv')
                @endif

                @if(Auth::guard('admin')->user()->is_super == 1)
                <div class="row">
                    <!-- Duyệt thẻ chậm -->
                    <div class="col-xl-8 col-lg-7">
                        @include('admin.components.check_card')
                    </div>
                    <!-- Thành viên mới -->
                    <div class="col-xl-4 col-lg-5">
                        @include('admin.partials.find_history')
                        @include('admin.components.new_users')
                    </div>
                </div>
                <div class="row">
                    <!-- Duyệt thẻ chậm -->
                    <div class="col-xl-12 col-lg-12">
                        @include('admin.components.request_processing')
                    </div>
                </div>
                @endif
            </div>
            <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            @include('admin.layouts.components.footer')
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
@endsection
