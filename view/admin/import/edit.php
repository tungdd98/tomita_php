<script>
document.title = 'Quản lý đơn hàng nhập'
</script>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo !empty($record) ? 'Cập nhật đơn nhập' : 'Thêm mới đơn nhập' ?></h1>
    <div class="card shadow mb-4">
        <form method="POST" action="<?php echo $formAction ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="category">Sản phẩm</label>
                    <select class="form-control" id="category" name="product_id" required>
                        <option value="" <?php if(empty($record)) { ?> selected <?php } ?> disabled>--- Chọn ---
                        </option>
                        <?php foreach($products as $key => $val) { ?>
                        <option value="<?php echo $val->id ?>" <?php if(!empty($record) && $record->id === $val->id) {?>
                            selected <?php } ?>>
                            <?php echo $val->title ?></option>
                        <?php }; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng nhập<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="quantity" required name="quantity"
                        value="<?php echo !empty($record->quantity) ? $record->quantity : 0 ?>">
                </div>
                <div class="form-group">
                    <label for="price">Đơn giá nhập <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="price" required name="price"
                        value="<?php echo !empty($record->price) ? $record->price : 0 ?>">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mx-1">Lưu lại</button>
                        <button type="button" class="btn btn-dark mx-1" onclick="window.history.back()">Huỷ bỏ</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<script tyle="text/javascript">
CKEDITOR.replace("description");
CKEDITOR.replace("content");
</script>