<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" style="font-weight: bold; text-transform: uppercase; color: red; text-align: center;">Thông báo</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12">
            {!! $description !!}
        </div>
    </div>
</div>
<div class="modal-footer">
    <a class="btn c-bg-green-4 c-font-white c-btn-square c-btn-uppercase c-btn-bold load-modal" rel="{{ asset('user/rut-kim-cuong') }}">Rút kim cương</a>
    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal" onclick="location.reload();">Đóng</button>
</div>

<script type="text/javascript">

</script>
