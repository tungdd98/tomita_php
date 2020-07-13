<script>
document.title = 'Quản lý kích thước sản phẩm'
</script>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo !empty($record) ? 'Cập nhật kích thước' : 'Thêm mới kích thước' ?></h1>
    <div class="card shadow mb-4">

        <form method="POST" action="<?php echo $formAction ?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Kích thước <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" required name="size"
                        value="<?php echo !empty($record->size) ? $record->size : '' ?>">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mx-1">Lưu lại</button>
                    <button type="button" class="btn btn-dark mx-1" onclick="window.history.back()">Huỷ bỏ</button>
                </div>
            </div>
        </form>

    </div>

</div>