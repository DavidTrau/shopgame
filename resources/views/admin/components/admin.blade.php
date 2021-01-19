<div class="row">
    @include('admin.partials.info', [
        'title' => 'Tổng ACC tháng',
        'value' => $data_show['total_acc_month'] ?? 0
    ])
    @include('admin.partials.info', [
        'title' => 'Tổng ACC hôm nay',
        'value' => $data_show['total_acc_day'] ?? 0
    ])

    @include('admin.partials.info', [
        'title' => 'Thu nhập tháng này',
        'value' => $data_show['total_month'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])

    @include('admin.partials.info', [
        'title' => 'Thu nhập hôm nay',
        'value' => $data_show['total_day'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
</div>
<div class="row">
    @include('admin.partials.info', [
        'title' => 'Tổng ACC Random tháng',
        'value' => $data_show['total_random_month'] ?? 0
    ])

    @include('admin.partials.info', [
        'title' => 'Tổng ACC Random hôm nay',
        'value' => $data_show['total_random_day'] ?? 0
    ])

    @include('admin.partials.info', [
        'title' => 'Tổng ACC Random Coin tháng',
        'value' => $data_show['total_random_coin_month'] ?? 0
    ])

    @include('admin.partials.info', [
        'title' => 'Tổng ACC Random Coin hôm nay',
        'value' => $data_show['total_random_coin_day'] ?? 0
    ])
</div>
<div class="row">
    @include('admin.partials.info', [
        'title' => 'Tổng Vòng quay tháng',
        'value' => $data_show['total_spin_month'] ?? 0
    ])

    @include('admin.partials.info', [
        'title' => 'Tổng Vòng quay hôm nay',
        'value' => $data_show['total_spin_day'] ?? 0
    ])

    @include('admin.partials.info', [
        'title' => 'Tổng Vòng quay tiền ảo tháng',
        'value' => $data_show['total_spin_coin_month'] ?? 0
    ])

    @include('admin.partials.info', [
        'title' => 'Tổng Vòng quay tiền ảo hôm nay',
        'value' => $data_show['total_spin_coin_day'] ?? 0
    ])
</div>
<div class="row">
    @include('admin.partials.info', [
        'title' => 'Tổng Máy xèng tháng',
        'value' => $data_show['total_slot_machine_month'] ?? 0
    ])
    @include('admin.partials.info', [
        'title' => 'Tổng Máy xèng hôm nay',
        'value' => $data_show['total_slot_machine_day'] ?? 0
    ])
    @include('admin.partials.info', [
        'title' => 'Tổng Lật hình tháng',
        'value' => $data_show['total_flip_card_month'] ?? 0
    ])
    @include('admin.partials.info', [
        'title' => 'Tổng Lật hình hôm nay',
        'value' => $data_show['total_flip_card_day'] ?? 0
    ])
</div>
<div class="row">
    @include('admin.partials.info', [
        'title' => 'Thu nhập Vòng quay tháng',
        'value' => $data_show['income_spin_month'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
    @include('admin.partials.info', [
        'title' => 'Thu nhập Vòng quay hôm nay',
        'value' => $data_show['income_spin_day'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
    @include('admin.partials.info', [
        'title' => 'Thu nhập Vòng quay tiền ảo tháng',
        'value' => $data_show['income_spin_coin_month'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
    @include('admin.partials.info', [
        'title' => 'Thu nhập Vòng quay tiền ảo hôm nay',
        'value' => $data_show['income_spin_coin_day'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
</div>
<div class="row">
    @include('admin.partials.info', [
        'title' => 'Thu nhập Máy xèng tháng',
        'value' => $data_show['income_slot_machine_month'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
    @include('admin.partials.info', [
        'title' => 'Thu nhập Máy xèng hôm nay',
        'value' => $data_show['income_slot_machine_day'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
    @include('admin.partials.info', [
        'title' => 'Thu nhập Lật hình tháng',
        'value' => $data_show['income_flip_card_month'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
    @include('admin.partials.info', [
        'title' => 'Thu nhập Lật hình hôm nay',
        'value' => $data_show['income_flip_card_day'] ?? 0,
        'type' => 'success',
        'icon' => 'fa-dollar-sign'
    ])
</div>
