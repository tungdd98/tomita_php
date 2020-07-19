<div class="container mt-5">
    <h1 class="display-4">Sản phẩm phù hợp</h1>
    <p class="py-2">Từ khoá: <?php echo $query ?></p>
    <?php if(count($products) > 0) {?>
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
                    <h3 class="title"><a href="product/<?php echo $val->id ?>" title=""><?php echo $val->title ?></a>
                    </h3>
                    <?php if($val->price > 0) { ?>
                    <div class="price">
                        <span><strong><?php echo number_format(getPrice($val->price, $val->sale), 0, ".", "."); ?>
                                VNĐ</strong></span>
                        <?php if($val->sale != 0) { ?>
                        <div><del><?php echo number_format($val->price, 0, ".", "."); ?> VNĐ</del>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } else {?>
                    <div class="text-danger font-weight-bold" style="font-size: 18px">Liên hệ</div>
                    <?php } ?>
                    <?php if($val->quantity <= 0) { ?>
                    <div>Hết hàng</div>
                    <?php } ?>
                </div>
                <?php if($val->sale > 0) {?>
                <span class="sales">-<?php echo $val->sale ?>%</span>
                <?php }?>
                <div class="control">
                    <?php if($val->quantity > 0) { ?>
                    <button title="" class="add-cart btn-crt" onclick="addCart(<?php echo $val->id ?>, 1, true)"><i
                            class="fa fa-cart-plus"></i></button>
                    <?php } ?>
                    <a href="product/<?php echo $val->id ?>" title="" class="view-details btn-crt"><i
                            class="fa fa-external-link"></i></a>
                    <a href="product/<?php echo $val->id ?>" class="link"></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } else {?>
    <div class="text-center my-5">Không có sản phẩm</div>
    <?php }?>
</div>