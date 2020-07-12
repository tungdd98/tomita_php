<head>
    <link href="public/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="public/backend/vendor/datatables/jquery.dataTables.min.js" defer></script>
    <script src="public/backend/vendor/datatables/dataTables.bootstrap4.min.js" defer></script>
    <script src="public/backend/js/demo/datatables-demo.js" defer></script>
    <script>
    document.title = 'Quản lý đơn hàng'
    </script>
</head>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn hàng</h1>
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
                            <td><?php echo $val->created_at ?></td>
                            <td><?php echo $val->total ?></td>
                            <td class="text-center">
                                <a href="admin/category/edit/<?php echo $val->id ?>" class="text-info px-1"><i
                                        class="fa fa-pen"></i></a>
                                <a href="javascript:;" class="text-danger px-1"><i class="fa fa-eye"
                                        onclick="deleteItem(<?php echo $val->id ?>, 'category')"></i></a>
                            </td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>