<script>
document.title = 'Quản lý sản phẩm'
</script>
<?php 
    // echo "<pre>";
    // print_r($sizes);
    // echo "</pre>";
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo !empty($record) ? 'Cập nhật sản phẩm' : 'Thêm mới sản phẩm' ?></h1>
    <div class="card shadow mb-4">
        <form method="POST" action="<?php echo $formAction ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select class="form-control" id="category" name="category[]" required multiple>
                                <option value="" <?php if(empty($record)) { ?> selected <?php } ?> disabled>--- Chọn ---
                                </option>
                                <?php foreach($categories as $key => $val) { ?>
                                <option value="<?php echo $val->id ?>"
                                    <?php if(!empty($val->checked) && $val->checked == true){?> selected <?php }?>>
                                    <?php echo $val->title ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" required name="title"
                                value="<?php echo !empty($record->title) ? $record->title : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" class="form-control" id="description"
                                style="min-height:200px;">
                                <?php echo !empty($record->description) ? $record->description : '' ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Nội dung</label>
                            <textarea name="content" class="form-control" id="content" style="min-height:200px;">
                            <?php echo !empty($record->content) ? $record->content : '' ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="price">Đơn giá <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="price" required name="price"
                                value="<?php echo !empty($record->price) ? $record->price : 0 ?>">
                        </div>
                        <div class="form-group">
                            <label for="sale">Giảm giá (%)</label>
                            <input type="text" class="form-control" id="sale" name="sale"
                                value="<?php echo !empty($record->sale) ? $record->sale : 0 ?>">
                        </div>
                        <div class="form-group">
                            <label for="size">Kích thước</label>
                            <div class="row">
                                <?php foreach($sizes as $key => $val) { ?>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-check">
                                        <input type="checkbox" name="size[]" value="<?php echo $val->id ?>"
                                            class="form-check-input" id="<?php echo "check" . $val->id ?>"
                                            <?php if(!empty($val->checked) && $val->checked == true){?> checked
                                            <?php }?>>
                                        <label class="form-check-label"
                                            for="<?php echo "check" . $val->id?>"><?php echo $val->size ?></label>
                                    </div>
                                </div>
                                <?php }; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Ảnh đại diện</label>
                            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="form-group">
                            <label for="images">Album ảnh</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        </div>
                    </div>
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