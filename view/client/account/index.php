<section class="page-primary v2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
            </ol>
        </nav>
        <div class="wrap-account">
            <form id="update-user">
                <div class="ct-account">
                    <h3 class="title-acc">thông tin cá nhân</h3>
                    <div class="form-account">
                        <div class="form-group">
                            <span>Email <small>*</small> :</span>
                            <input type="email" class="form-control" name="email"
                                value="<?php echo !empty($user->email) ? $user->email : '' ?>" disabled>
                        </div>
                        <div class="form-group">
                            <span>Họ tên <small>*</small> :</span>
                            <input type="text" class="form-control"
                                value="<?php echo !empty($user->name) ? $user->name : '' ?>" required name="name">
                        </div>
                        <div class="form-group">
                            <span>Số điện thoại <small>*</small> :</span>
                            <input type="tel" class="form-control" name="phone" required
                                value="<?php echo !empty($user->phone) ? $user->phone : '' ?>">
                        </div>
                        <div class="form-group">
                            <span>Nghề nghiệp :</span>
                            <input type="text" class="form-control" placeholder="Chưa xác định">
                        </div>
                        <div class="form-group">
                            <span for="address">Địa chỉ</span>
                            <textarea rows="5" class="form-control" id="address" name="address"
                                required><?php echo !empty($user->address) ? $user->address : '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <span class="empty">&nbsp;</span>
                            <button class="btn-account" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>