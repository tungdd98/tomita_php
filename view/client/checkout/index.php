<section class="container py-5">
    <h1 class="display-4 text-center my-5">Thanh toán đơn hàng</h1>
    <?php if (empty($_SESSION['email'])) {?>
    <p class="text-center">Vui lòng <a href="login" class="font-italic text-danger">Đăng nhập</a> để tiến hành thanh
        toán!</p>
    <?php } else {?>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="font-weight-bold h4">Thông tin khách hàng</h2>
                    <form action="">
                        <div class="form-group">
                            <label for="name">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" required name="name"
                                value="<?php echo !empty($user->name) ? $user->name : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" required name="email"
                                value="<?php echo !empty($user->email) ? $user->email : '' ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="phone" class="form-control" id="phone" name="phone" required
                                value="<?php echo !empty($user->phone) ? $user->phone : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="address" class="form-control" id="address" name="address" required
                                value="<?php echo !empty($user->address) ? $user->address : '' ?>">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mx-1">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <h2 class="font-weight-bold h4">Thông tin đơn hàng</h2>
                </div>
            </div>
        </div>

    </div>
    <?php }?>
</section>