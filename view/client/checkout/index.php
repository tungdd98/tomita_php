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
                    <h2 class="font-weight-bold h5">Thông tin khách hàng</h2>
                    <form id="update-user">
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
                            <input type="text" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}"
                                value="<?php echo !empty($user->phone) ? $user->phone : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <textarea rows="5" class="form-control" id="address" name="address"
                                required><?php echo !empty($user->address) ? $user->address : '' ?></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="v-button">Cập nhật</button>
                        </div>
                    </form>
                    <hr>
                    <h2 class="font-weight-bold h5">Hình thức giao hàng</h2>
                    <p>Giao tiêu chuẩn</p>
                    <hr>
                    <h2 class="font-weight-bold h5">Phương thức thanh toán</h2>
                    <p>Tiền mặt</p>
                </div>
                <div class="col-md-5">
                    <div>
                        <h2 class="font-weight-bold h5">Thông tin đơn hàng</h2>
                        <div class="d-flex justify-content-between mb-2" id="checkout-subtotal">
                            <div>Tổng tạm tính:</div>
                            <div class="info">10đ</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div>Phí vận chuyển:</div>
                            <div class="info">0đ</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2" id="checkout-total">
                            <div>Tổng tiền</div>
                            <div class="h6 info">10đ</div>
                        </div>
                        <div class="d-flex justify-content-end pt-5">
                            <button class="v-button" onclick="checkout()">Mua hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php }?>
</section>