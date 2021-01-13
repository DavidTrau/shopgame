<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Ảnh mặc định</label>
        <input type="hidden" id="bg_front" name="bg_front" value="{{ isset($item->bg_front) ? $item->bg_front : 'https://via.placeholder.com/500x400' }}">
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <img src="{{ isset($item->bg_front) && $item->bg_front != '' ? $item->bg_front : asset('assets/images/flip/card.png') }}"
         id="view-bg_front"
         alt="Ảnh bìa"
         class="img-responsive"
         style="max-width: 100%; max-height: 300px"
    />
</div>
<div class="col-sm-12 col-md-4">
    <div id="upload_bg_front" action="" class="dropzone">
        <div class="fallback">
            <input name="file" type="file"/>
        </div>
        <div class="dz-message">
            Click để tải file hoặc kéo thả ảnh mặc định vào đây !!
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#upload_bg_front").dropzone({
                url: '{!! asset('admin/upload/image') !!}',
                method: 'post',
                parallelUploads: 1,
                sending: function (file, xhr, formData) {
                    formData.append('_token', '{!! csrf_token() !!}');
                },
                success: function (file, res) {
                    if (res.status == 'success') {
                        updateImage(res.url);
                    }
                }
            });
        });
        function updateImage(url) {
            $('#view-bg_front').attr('src', url);
            $('#bg_front').val(url);
        }
    </script>
</div>
