<section class="page-product page-primary">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrumbs ?></li>
            </ol>
        </nav>
        <h2 class="head-primary v3"><?php echo $breadcrumbs ?></h2>
        <div class="wrap-pro-list">
            <div class="row">
                <div class="col-lg-9">
                    <div class="list-product">
                        <div class="head">
                            <h3 class="title-pro">Tất cả</h3>
                            <div class="filter">
                                <span>Sắp xếp theo:</span>
                                <div class="dropdown no-arrow d-inline-block">
                                    <a class="dropdown-toggle text-info px-1" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <button class="dropdown-item">
                                            <a
                                                href="/clothes?controller=product&action=filter&orderBy=created_at&orderDir=desc&id=<?php echo $categoryId ?>&page=0">Mới
                                                nhất
                                            </a>
                                        </button>
                                        <button class="dropdown-item">
                                            <a
                                                href="/clothes?controller=product&action=filter&orderBy=price&orderDir=desc&id=<?php echo $categoryId ?>&page=0">Giá
                                                từ cao tới thấp
                                            </a>
                                        </button>
                                        <button class="dropdown-item">
                                            <a
                                                href="/clothes?controller=product&action=filter&orderBy=price&orderDir=desc&id=<?php echo $categoryId ?>&page=0">Giá
                                                từ thấp tới cao
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (count($products['data']) > 0) {?>
                        <div class="row">
                            <?php foreach ($products['data'] as $key => $val) {?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="item-product">
                                    <a href="product/<?php echo $val->id ?>" title="" class="img-primary">
                                        <?php if (file_exists("public/upload/product/" . $val->thumbnail) && !empty($val->thumbnail)) {?>
                                        <img src="public/upload/product/<?php echo $val->thumbnail; ?>">
                                        <?php } else {;?>
                                        <img src="public/upload/no-image.jpg">
                                        <?php }?>
                                    </a>
                                    <div class="ct">
                                        <h3 class="title"><a href="product/<?php echo $val->id ?>"
                                                title=""><?php echo $val->title ?></a></h3>
                                        <?php if ($val->price > 0) {?>
                                        <div class="price">
                                            <span><strong><?php echo number_format(getPrice($val->price, $val->sale), 0, ".", "."); ?>
                                                    VNĐ</strong></span>
                                            <?php if ($val->sale != 0) {?>
                                            <div><del><?php echo number_format($val->price, 1, ".", "."); ?> VNĐ</del>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <?php } else {?>
                                        <div class="text-danger font-weight-bold" style="font-size: 18px">Liên hệ</div>
                                        <?php }?>
                                        <?php if ($val->quantity <= 0) {?>
                                        <div>Hết hàng</div>
                                        <?php }?>
                                    </div>
                                    <?php if ($val->sale > 0) {?>
                                    <span class="sales">-<?php echo $val->sale ?>%</span>
                                    <?php }?>
                                    <div class="control">
                                        <?php if ($val->quantity > 0) {?>
                                        <button title="" class="add-cart btn-crt"
                                            onclick="addCart(<?php echo $val->id ?>, 1, `<?php echo isset($_SESSION['cart']) && isset($_SESSION['cart'][$val->id]) ? $_SESSION['cart'][$val->id]['size'] : '' ?>`, true)"><i
                                                class="fa fa-cart-plus"></i></button>
                                        <?php }?>
                                        <a href="product/<?php echo $val->id ?>" title=""
                                            class="view-details btn-crt"><i class="fa fa-external-link"></i></a>
                                        <a href="product/<?php echo $val->id ?>" class="link"></a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <?php } else {?>
                        <div class="text-center py-10">Không có sản phẩm</div>
                        <?php }?>
                        <?php if ($products['numberPage'] > 1) {?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <= $products['numberPage']; $i++) {?>
                                <li class="page-item"><a class="page-link"
                                        href="category/<?php echo $categoryId ?>/page=<?php echo $i ?>"><?php echo $i ?></a>
                                </li>
                                <?php }?>
                            </ul>
                        </nav>
                        <?php }?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="block-cate-pro mb-2">
                        <h3 class="title" style="font-size: 20px; font-weight: 600">Lọc theo giá</h3>
                        <form action="/clothes/index.php?controller=product&action=price&id=<?php echo $categoryId ?>"
                            method="POST">
                            <div class="form-group">
                                <label for="">Từ </label>
                                <input type="number" step="50000" class="form-control form-control-sm" name="start"
                                    value=<?php echo $products['start'] ?>>
                            </div>
                            <div class="form-group">
                                <label for="">Đến </label>
                                <input type="number" step="50000" class="form-control form-control-sm" name="end"
                                    value=<?php echo $products['end'] ?>>
                            </div>
                            <button class="btn btn-outline-danger btn-sm" type="submit">Lọc</button>
                        </form>
                    </div>
                    <div class="sb-product">
                        <div class="block-cate-pro">
                            <h3 class="title">Danh mục sản phẩm</h3>
                            <?php showCategoriesHor($categories)?>
                        </div>
                        <div class="block-qc v2">
                            <a href="" title=""><img src="public/frontend/images/bn-qc1.jpg" alt=""></a>
                        </div>
                        <div class="block-qc v2">
                            <a href="" title=""><img src="public/frontend/images/bn-qc2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>