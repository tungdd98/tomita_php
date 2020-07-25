<section class="bn-page mgt">
    <img src="public/frontend/images/bn-promotion.jpg" alt="">
</section>
<section class="page-promotion page-primary">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Khuyến mãi</li>
            </ol>
        </nav>
        <h2 class="head-primary">Khuyến mãi</h2>
        <h3 class="title-promotion">Tin khuyến mãi</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="block-qc">
                    <a href="" title=""><img src="public/frontend/images/bn-qc3.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block-qc">
                    <a href="" title=""><img src="public/frontend/images/bn-qc4.jpg" alt=""></a>
                </div>
            </div>
        </div>
        <h3 class="title-promotion v2">Sản phẩm khuyến mãi</h3>
        <div class="row">
            <?php foreach($products as $key => $val) { ?>
            <div class="col-lg-3 col-sm-6">
                <div class="item-product">
                    <a href="product/<?php echo $val->id ?>" title="" class="img-primary">
                        <?php if(file_exists("public/upload/product/" . $val->thumbnail) && !empty($val->thumbnail)) { ?>
                        <img src="public/upload/product/<?php echo $val->thumbnail; ?>">
                        <?php } else {; ?>
                        <img src="public/upload/no-image.jpg">
                        <?php } ?>
                    </a>
                    <div class="ct">
                        <h3 class="title"><a href="product/<?php echo $val->id ?>"
                                title=""><?php echo $val->title ?></a>
                        </h3>
                        <?php if($val->price > 0) { ?>
                        <div class="price">
                            <span><strong><?php echo number_format(getPrice($val->price, $val->sale), 1, ".", "."); ?>
                                    VNĐ</strong></span>
                            <?php if($val->sale != 0) { ?>
                            <div><del><?php echo number_format($val->price, 1, ".", "."); ?> VNĐ</del>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } else {?>
                        <div class="text-danger font-weight-bold" style="font-size: 18px">Liên hệ</div>
                        <?php } ?>
                    </div>
                    <span class="sales">-<?php echo $val->sale ?>%</span>
                    <div class="control">
                        <?php if ($val->quantity > 0) {?>
                        <button title="" class="add-cart btn-crt"
                            onclick="addCart(<?php echo $val->id ?>, 1, `<?php echo isset($_SESSION['cart']) && isset($_SESSION['cart'][$val->id]) ? $_SESSION['cart'][$val->id]['size'] : '' ?>`, true)"><i
                                class="fa fa-cart-plus"></i></button>
                        <?php }?>
                        <a href="product/<?php echo $val->id ?>" title="" class="view-details btn-crt"><i
                                class="fa fa-external-link"></i></a>
                        <a href="product/<?php echo $val->id ?>" class="link"></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>