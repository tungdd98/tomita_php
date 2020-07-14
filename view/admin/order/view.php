<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-5">
                <h4 class="">Thông tin khách hàng</h4>
                <hr>
                <p>Tên khách hàng: <b><?php echo $user->name ?></b></p>
                <p>Số điện thoại: <b><?php echo $user->phone ?></b></p>
                <p>Email: <b><?php echo $user->email ?></b></p>
                <p>Địa chỉ: <b><?php echo $user->address ?></b></p>
            </div>
            <div class="mb-5">
                <h4>Thông tin sản phẩm</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng mua</th>
                                <th>Kích thước</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $key => $val) { ?>
                            <tr>
                                <td><?php echo $val->id ?></td>
                                <td><?php echo textTrundate($val->title) ?></td>
                                <td><?php echo number_format(getPrice($val->price, $val->sale), 1, ".", "."); ?> VNĐ
                                </td>
                                <td><?php echo $val->number ?></td>
                                <td><?php echo $val->size ?></td>
                                <td><?php echo number_format(getPrice($val->price, $val->sale) * $val->number, 2, '.', '.') ?>
                                    VNĐ</td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-dark mx-1" onclick="window.history.back()">Quay lại</button>
            </div>
        </div>
    </div>

</div>