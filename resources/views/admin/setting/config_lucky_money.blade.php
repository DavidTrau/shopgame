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
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Cấu hình Lì xì</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form id="fm-config-lucky-money" action="{!! asset('admin/setting/config-lucky-money') !!}" method="post">
                                        @method('post')
                                        @csrf
                                        <div class="form-group">
                                            <label for="value">Giá trị (Kim cương)</label>
                                            <input type="number" class="form-control" id="value" name="value" placeholder="Giá trị" value="{{ isset($config['value']) ? $config['value'] : 0 }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Mô tả</label>
                                            <textarea type="text" class="form-control text-editor" id="description" name="description" placeholder="Mô tả kết quả">{!! isset($config['description']) ? $config['description'] : '' !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Cấu hình</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            @include('admin.layouts.components.footer')
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#fm-config-lucky-money").validate({
                rules: {
                    value: {
                        required: true,
                        min: 0,
                    },
                    description: {
                        required: true
                    }
                },
                messages: {
                    value: {
                        required: 'Đây là trường bắt buộc.',
                        min: 'Số lượng phải lớn hơn 0.'
                    },
                    description: {
                        required: 'Đây là trường bắt buộc.',
                    }
                },
                submitHandler: function(form) {
                    let url = $(form).attr('action');
                    let method = $(form).attr('method');
                    let params = $(form).serializeArray();
                    let formData = new FormData();
                    $.each(params, function (i, val) {
                        formData.append(val.name, val.value);
                    });
                    callAjax(url, method, formData).then(function (res) {
                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành Công !',
                                text: res.message || ''
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi !',
                                text: res.message || ''
                            });
                        }
                    });
                }
            });
        });


    </script>
@endsection
