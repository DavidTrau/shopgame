<div class="lucky_money" id="lucky_money">
    <img src="{{ asset('/assets/images/lixi.gif') }}"
         alt="{{ asset('/assets/images/lixi.gif') }}"
         onclick="takeGift()"
    >
</div>

<script type="text/javascript">
    @if(Auth::check())
    $(document).ready(function () {
        $.ajax({
            url: '{!! asset('user/check-got-lucky-money') !!}/',
            method: 'GET',
            success: function (res) {
                if (res.status) {
                    $('#lucky_money').remove();
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    });
    @endif
    function takeGift() {
        $.ajax({
            url: '{!! asset('check-login') !!}',
            method: 'GET',
            success: function (res) {
                if (res.status === true) {
                    // logged -> open modal
                    modal.open('{!! asset('user/get-gift') !!}')
                } else {
                    // not logged -> redirect login
                    window.location.href = '{!! asset('login') !!}';
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }
</script>
