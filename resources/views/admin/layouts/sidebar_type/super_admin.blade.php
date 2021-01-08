<!-- Admin -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-user"></i>
        <span><strong>CỘNG TÁC VIÊN</strong></span>
    </a>
    <div id="collapseAdmin" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/list') }}">Danh sách</a>
            <a class="collapse-item" href="{{ asset('admin/create') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- User -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-user"></i>
        <span><Strong>NGƯỜI DÙNG</strong></span>
    </a>
    <div id="collapseUser" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/user/user') }}">Danh sách</a>
        </div>
    </div>
</li>

<!-- Setting -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span><strong>CẤU HÌNH</strong></span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/setting/setting/general') }}">Thông tin hiển thị</a>
            <a class="collapse-item" href="{{ asset('admin/setting/atm') }}">Thanh toán</a>
            <a class="collapse-item" href="{{ asset('admin/setting/logo') }}">Logo</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-slider-background') }}">Slider/Background</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-ntn') }}">Key Napthenhanh</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-cv') }}">Key Cardvip</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-ntd') }}">Key Naptudong</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-login-fb') }}">LoginFB</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-imgur') }}">Key Upload Image</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-alert') }}">Cấu hình Thông báo</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-tichhop') }}">Key Tích hợp(SMS)</a>
            <a class="collapse-item" href="{{ asset('admin/setting/config-messenger') }}">Messenger</a>
        </div>
    </div>
</li>

<!-- Category -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#list-user" aria-expanded="true" aria-controls="list-user">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>DANH MỤC GAME</strong></span>
    </a>
    <div id="list-user" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/category/category') }}">Danh sách</a>
            <a class="collapse-item" href="{{ asset('admin/category/category/create') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Account -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#list-category-global" aria-expanded="true" aria-controls="list-category-global">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>ACC GAME</strong></span>
    </a>
    <div id="list-category-global" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/account/account') }}">Tất cả</a>
            <a class="collapse-item" href="{{ asset('admin/account/account/create?type=1') }}">Thêm TK Liên Quân</a>
            <a class="collapse-item" href="{{ asset('admin/account/account/create?type=2') }}">Thêm TK Free Fire</a>
        </div>
    </div>
</li>

<!-- Spin -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#spin" aria-expanded="true" aria-controls="spin">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>VÒNG QUAY ACC</strong></span>
    </a>
    <div id="spin" class="collapse" aria-labelledby="spin" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/spin/spin') }}">Danh sách</a>
            <a class="collapse-item" href="{{ asset('admin/spin/spin/create') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Spin Coin -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#spin_coin" aria-expanded="true" aria-controls="spin_coin">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>VÒNG QUAY COIN</strong></span>
    </a>
    <div id="spin_coin" class="collapse" aria-labelledby="spin" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/spin/coin') }}">Danh sách</a>
            <a class="collapse-item" href="{{ asset('admin/spin/coin/create?type=kimcuong') }}">Thêm Kim cương</a>
            <a class="collapse-item" href="{{ asset('admin/spin/coin/create?type=quanhuy') }}">Thêm Quân huy</a>
        </div>
    </div>
</li>

<!-- Random -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#random" aria-expanded="true" aria-controls="random">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>RANDOM ACC</strong></span>
    </a>
    <div id="random" class="collapse" aria-labelledby="random" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/random/random') }}">Danh sách</a>
            <a class="collapse-item" href="{{ asset('admin/random/random/create') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Random coin -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#randomCoin" aria-expanded="true" aria-controls="randomCoin">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>RANDOM COIN</strong></span>
    </a>
    <div id="randomCoin" class="collapse" aria-labelledby="random" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/gift-box/gift') }}">Danh sách</a>
            <a class="collapse-item" href="{{ asset('admin/gift-box/gift/create') }}">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Game -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#game" aria-expanded="true" aria-controls="randomCoin">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>GAME</strong></span>
    </a>
    <div id="game" class="collapse" aria-labelledby="random" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/slot-machine/slot-machine') }}">Máy xèng</a>
            <a class="collapse-item" href="{{ asset('admin/slot-machine/slot-machine/create?model=halloween') }}">Thêm MX Tùy Chỉnh</a>
            <a class="collapse-item" href="{{ asset('admin/flip-card/flip-card') }}">Lật thẻ bài</a>
        </div>
    </div>
</li>

<!-- History -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#history" aria-expanded="true" aria-controls="history">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>LỊCH SỬ</strong></span>
    </a>
    <div id="history" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/history/account') }}">Mua ACC</a>
            <a class="collapse-item" href="{{ asset('admin/history/random') }}">Random ACC</a>
            <a class="collapse-item" href="{{ asset('admin/history/spin') }}">Vòng quay ACC</a>
            <a class="collapse-item" href="{{ asset('admin/history/spin-coin') }}">Vòng quay coin</a>
            <a class="collapse-item" href="{{ asset('admin/history/wallet') }}">Rút QH/KC</a>
            <a class="collapse-item" href="{{ asset('admin/history/box') }}">Random Coin</a>
            <a class="collapse-item" href="{{ asset('admin/history/slot-machine') }}">Máy xèng</a>
            <a class="collapse-item" href="{{ asset('admin/history/flip-card') }}">Lật thẻ bài</a>
        </div>
    </div>
</li>

<!-- Pay -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#historyVirtual" aria-expanded="true" aria-controls="historyVirtual">
        <i class="fas fa-fw fa-list"></i>
        <span><strong>LỊCH SỬ ẢO</strong></span>
    </a>
    <div id="historyVirtual" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/virtual-history/virtual-history') }}">Lịch sử</a>
            <a class="collapse-item" href="{{ asset('admin/virtual-history-special/virtual-history-special') }}">Nổ hũ</a>
        </div>
    </div>
</li>

<!-- Pay -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#charge-1" aria-expanded="true" aria-controls="charge-1">
        <i class="fas fa-fw fa-money-bill-wave-alt"></i>
        <span>{{ config('payment.type')[1] }}</span>
    </a>
    <div id="charge-1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/payment/statistical?payment_id=1') }}">Thống kê</a>
            <a class="collapse-item" href="{{ asset('admin/payment/payment?paymentType=1') }}">Cài đặt</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#charge-2" aria-expanded="true" aria-controls="charge-2">
        <i class="fas fa-fw fa-money-bill-wave-alt"></i>
        <span>{{ config('payment.type')[2] }}</span>
    </a>
    <div id="charge-2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/charge/approved') }}">Duyệt thẻ</a>
            <a class="collapse-item" href="{{ asset('admin/payment/statistical?payment_id=2') }}">Thống kê</a>
            <a class="collapse-item" href="{{ asset('admin/payment/payment?paymentType=2') }}">Cài đặt</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#top-charge" aria-expanded="true" aria-controls="top-charge">
        <i class="fas fa-fw fa-money-bill-wave-alt"></i>
        <span><strong>TOP NẠP THẺ</strong></span>
    </a>
    <div id="top-charge" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ asset('admin/top-charge') }}">Danh sách</a>
        </div>
    </div>
</li>
