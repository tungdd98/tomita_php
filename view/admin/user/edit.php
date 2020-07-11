<script>
document.title = 'Quản lý tài khoản'
</script>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo !empty($record) ? 'Cập nhật khách hàng' : 'Thêm mới khách hàng' ?></h1>
    <div class="card shadow mb-4">
        <form method="POST" action="<?php echo $formAction ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label for="name">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" required name="name"
                                value="<?php echo !empty($record->name) ? $record->name : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" required name="email"
                                value="<?php echo !empty($record->email) ? $record->email : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" required name="password"
                                value="<?php echo !empty($record->password) ? $record->password : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="phone" class="form-control" id="phone" name="phone"
                                value="<?php echo !empty($record->phone) ? $record->phone : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="address" class="form-control" id="address" name="address"
                                value="<?php echo !empty($record->address) ? $record->address : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="thumbnail">Ảnh đại diện</label>
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