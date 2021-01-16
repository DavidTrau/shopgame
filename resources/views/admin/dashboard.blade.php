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

                <div class="row">
                    @include('admin.partials.info', [
                        'title' => 'Tổng ACC tháng',
                        'value' => $data_show['total_acc_month']
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Tổng ACC hôm nay',
                        'value' => $data_show['total_acc_day']
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Thu nhập tháng này',
                        'value' => $data_show['total_month'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Thu nhập hôm nay',
                        'value' => $data_show['total_day'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                </div>
                <div class="row">
                    @include('admin.partials.info', [
                        'title' => 'Tổng ACC Random tháng',
                        'value' => $data_show['total_random_month']
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Tổng ACC Random hôm nay',
                        'value' => $data_show['total_random_day']
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Tổng ACC Random Coin tháng',
                        'value' => $data_show['total_random_coin_month']
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Tổng ACC Random Coin hôm nay',
                        'value' => $data_show['total_random_coin_day']
                    ])
                </div>

                <div class="row">
                    @include('admin.partials.info', [
                        'title' => 'Tổng Vòng quay tháng',
                        'value' => $data_show['total_spin_month']
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Tổng Vòng quay hôm nay',
                        'value' => $data_show['total_spin_day']
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Tổng Vòng quay tiền ảo tháng',
                        'value' => $data_show['total_spin_coin_month']
                    ])

                    @include('admin.partials.info', [
                        'title' => 'Tổng Vòng quay tiền ảo hôm nay',
                        'value' => $data_show['total_spin_coin_day']
                    ])
                </div>

                <div class="row">
                    @include('admin.partials.info', [
                        'title' => 'Tổng Máy xèng tháng',
                        'value' => $data_show['total_slot_machine_month']
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Tổng Máy xèng hôm nay',
                        'value' => $data_show['total_slot_machine_day']
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Tổng Lật hình tháng',
                        'value' => $data_show['total_flip_card_month']
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Tổng Lật hình hôm nay',
                        'value' => $data_show['total_flip_card_day']
                    ])
                </div>
                <div class="row">
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Vòng quay tháng',
                        'value' => $data_show['income_spin_month'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Vòng quay hôm nay',
                        'value' => $data_show['income_spin_day'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Vòng quay tiền ảo tháng',
                        'value' => $data_show['income_spin_coin_month'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Vòng quay tiền ảo hôm nay',
                        'value' => $data_show['income_spin_coin_day'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                </div>

                <div class="row">
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Máy xèng tháng',
                        'value' => $data_show['income_slot_machine_month'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Máy xèng hôm nay',
                        'value' => $data_show['income_slot_machine_day'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Lật hình tháng',
                        'value' => $data_show['income_flip_card_month'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                    @include('admin.partials.info', [
                        'title' => 'Thu nhập Lật hình hôm nay',
                        'value' => $data_show['income_flip_card_day'],
                        'type' => 'success',
                        'icon' => 'fa-dollar-sign'
                    ])
                </div>

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
