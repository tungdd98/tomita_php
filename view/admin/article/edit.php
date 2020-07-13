<script>
document.title = 'Quản lý bài viết'
</script>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo !empty($record) ? 'Cập nhật bài viết' : 'Thêm mới bài viết' ?></h1>
    <div class="card shadow mb-4">
        <form method="POST" action="<?php echo $formAction ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label for="title">Tên bài viết <span class="text-danger">*</span></label>
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
                            <label for="price">Tác giả <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="price" required name="author"
                                value="<?php echo !empty($record->author) ? $record->author : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Ảnh bài viết</label>
                            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
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