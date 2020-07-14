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
            <div class="ct-account">
                <h3 class="title-acc v2">Lịch sử mua hàng</h3>
                <div class="history-order">
                    <table class="table">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày mua</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                        <?php foreach($data as $key => $val) { ?>
                        <tr>
                            <td><a href="history-order-detail.html" title=""><?php echo $val->id ?></a></td>
                            <td><?php echo date_format(date_create($val->created_at),"Y/m/d") ?></td>
                            <td><?php echo number_format($val->total, 0, '.', '.') ?> VNĐ</td>
                            <td><?php echo showStatusOrder($val->status)['label'] ?></td>
                        </tr>
                        <?php }; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>