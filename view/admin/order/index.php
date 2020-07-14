<head>
    <link href="public/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="public/backend/vendor/datatables/jquery.dataTables.min.js" defer></script>
    <script src="public/backend/vendor/datatables/dataTables.bootstrap4.min.js" defer></script>
    <script src="public/backend/js/demo/datatables-demo.js" defer></script>
    <script>
    document.title = "<?php echo $title ?>"
    <?php if(isset($_GET['status'])) {?>
        let title = ''
        <?php if($_GET['status'] == 'add') {?>
            title = "Thêm thành công!!",
        <?php } else if($_GET['status'] == 'update') {?>
            title = "Cập nhật thành công!!",
        <?php }?>
        Toast.fire({
            icon: "success",
            title,
        });
    <?php }?>
    </script>
</head>
<div class="container-fluid">
    <h1 class="h3 mb-5 text-gray-800"><?php echo $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Mã đơn hàng</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Tổng tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $val) { ?>
                        <tr>
                            <td><?php echo $val->id ?></td>
                            <td class="text-center">
                                <div class="badge badge-<?php echo showStatusOrder($val->status)['class'] ?>">
                                    <?php echo showStatusOrder($val->status)['label'] ?></div>
                            </td>
                            <td><?php echo date_format(date_create($val->created_at),"Y/m/d") ?></td>
                            <td><?php echo number_format($val->total, 0, '.', '.') ?> VNĐ</td>
                            <td class="text-center">
                                <div class="dropdown no-arrow d-inline-block">
                                    <a class="dropdown-toggle text-info px-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <button class="dropdown-item" onclick="updateStatus(<?php echo $val->id ?>, 0)">Chưa thanh toán</button>
                                        <button class="dropdown-item" onclick="updateStatus(<?php echo $val->id ?>, 1)">Đang vận chuyển</button>
                                        <button class="dropdown-item" onclick="updateStatus(<?php echo $val->id ?>, 2)">Đã thanh toán</button>
                                    </div>
                                </div>
                                <a href="admin/<?php echo $path ?>/view/<?php echo $val->id ?>" class="text-danger px-1">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>