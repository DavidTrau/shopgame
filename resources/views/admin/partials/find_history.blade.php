<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tìm kiếm lịch sử</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-3">
                    <input type="text" id="dateSelected" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" onclick="searchHistory();">Tìm</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td>Tổng thẻ đúng</td>
                        <td id="total_charge">0</td>
                    </tr>
                    <tr>
                        <td>Tổng ACC đã bán</td>
                        <td id="count_acc">0</td>
                    </tr>
                    <tr>
                        <td>Tổng ACC Random đã bán</td>
                        <td id="count_acc_random">0</td>
                    </tr>
                    <tr>
                        <td>Thu nhập Vòng quay</td>
                        <td id="income_spin">0</td>
                    </tr>
                    <tr>
                        <td>Thu nhập Vòng quay tiền</td>
                        <td id="income_spin_coin">0</td>
                    </tr>
                    <tr>
                        <td>Thu nhập Máy xèng</td>
                        <td id="income_slot_machine">0</td>
                    </tr>
                    <tr>
                        <td>Thu nhập Lật hình</td>
                        <td id="income_flip_card">0</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#dateSelected').datepicker({
        format: 'yyyy-mm-dd',
        language: 'vi'
    });
});

function searchHistory() {
    let dateSelected = $('#dateSelected').val();
    let formData = new FormData();
    formData.append('date', dateSelected);
    callAjax('{!! asset('admin/history-by-date') !!}', 'POST', formData).then(res => {
        for (const item in res) {
            $(`#${item}`).text(numeral(res[item]).format('0,0'));
        }
    })
}
</script>
