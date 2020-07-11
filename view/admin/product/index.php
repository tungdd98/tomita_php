<head>
    <link href="public/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="public/backend/vendor/datatables/jquery.dataTables.min.js" defer></script>
    <script src="public/backend/vendor/datatables/dataTables.bootstrap4.min.js" defer></script>
    <script src="public/backend/js/demo/datatables-demo.js" defer></script>
    <script>
    document.title = 'Quản lý sản phẩm'
    </script>
</head>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
    <div class="d-flex justify-content-end py-2">
        <a href="admin/product/add" class="btn btn-outline-primary">Thêm mới</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh </th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Số lượng tồn</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $val) { ?>
                        <tr>
                            <td><?php echo $val->id ?></td>
                            <td><?php echo textTrundate($val->title, 20) ?></td>
                            <td class="text-center">
                                <?php if(file_exists("public/upload/product/" . $val->thumbnail) && !empty($val->thumbnail)) { ?>
                                <img src="public/upload/product/<?php echo $val->thumbnail; ?>"
                                    style="width: 80px; height: 80px; object-fit: cover">
                                <?php } else {; ?>
                                <img src="public/upload/no-image.jpg"
                                    style="width: 80px; height: 80px; object-fit: cover">
                                <?php } ?>
                            </td>
                            <td><?php echo number_format($val->price, 1, ".", "."); ?> VNĐ</td>
                            <td><?php echo $val->sale ?>%</td>
                            <td><?php echo $val->quantity ?></td>
                            <td class="text-center">
                                <a href="admin/product/edit/<?php echo $val->id ?>" class="text-info px-1"><i
                                        class="fa fa-pen"></i></a>
                                <a href="javascript:;" class="text-danger px-1"><i class="fa fa-trash"
                                        onclick="deleteItem(<?php echo $val->id ?>, 'product')"></i></a>
                            </td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>