<script>
document.title = 'Quản lý danh mục'
</script>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo !empty($record) ? 'Cập nhật danh mục' : 'Thêm mới danh mục' ?></h1>
    <div class="card shadow mb-4">

        <form method="POST" action="<?php echo $formAction ?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Tên danh mục <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" required name="title"
                        value="<?php echo !empty($record->title) ? $record->title : '' ?>">
                </div>
                <div class="form-group">
                    <label for="parent">Danh mục cha</label>
                    <select class="form-control" id="parent" name="parentId">
                        <option value="" <?php if(empty($record)) { ?> selected <?php } ?> disabled>--- Chọn ---
                        </option>
                        <?php foreach($data as $key => $val) { ?>
                        <option value="<?php echo $val->id ?>"
                            <?php if(!empty($record) && $record->id === $val->parent_id) {?> selected <?php } ?>>
                            <?php echo $val->title ?></option>
                        <?php }; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mx-1">Lưu lại</button>
                    <button type="button" class="btn btn-dark mx-1" onclick="window.history.back()">Huỷ bỏ</button>
                </div>
            </div>
        </form>

    </div>

</div>