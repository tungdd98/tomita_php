<?php include_once "helper/index.php" ?>

<head>
    <link href="public/frontend/css/fancybox.css" type="text/css" rel="stylesheet">
    <link href="public/frontend/css/slick.css" type="text/css" rel="stylesheet">
    <script src="public/frontend/js/fancybox.js" defer></script>
    <script src="public/frontend/js/slick.min.js" defer></script>
</head>
<section class="page-product-dt page-primary v2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $category->title ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product->title ?></li>
            </ol>
        </nav>
        <div class="details-product">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sl-img-pro">
                        <span class="sales v2">-<?php echo $product->sale ?>%</span>
                        <div class="pro-img">
                            <?php $images = json_decode($product->images) ?>
                            <?php foreach($images as $key => $val) { ?>
                            <div class="item">
                                <a class="c-img" href="images/b-pro.jpg" title="" data-fancybox="gallery">
                                    <?php if(file_exists("public/upload/product/" . $val) && !empty($val)) { ?>
                                    <img src="public/upload/product/<?php echo $val; ?>">
                                    <?php } else {; ?>
                                    <img src="public/upload/no-image.jpg">
                                    <?php } ?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="pro-thumb">
                            <?php foreach($images as $key => $val) { ?>
                            <div class="item">
                                <a class="c-img">
                                    <?php if(file_exists("public/upload/product/" . $val) && !empty($val)) { ?>
                                    <img src="public/upload/product/<?php echo $val; ?>">
                                    <?php } else {; ?>
                                    <img src="public/upload/no-image.jpg">
                                    <?php } ?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-pro-dt">
                        <h1 class="title-pro"><?php echo $product->title ?></h1>
                        <?php if($product->price > 0) { ?>
                        <div class="price">
                            <span><strong><?php echo number_format(getPrice($product->price, $product->sale), 1, ".", "."); ?>
                                    VNĐ</strong></span>
                            <?php if($product->sale != 0) { ?>
                            <div><del><?php echo number_format($product->price, 1, ".", "."); ?> VNĐ</del>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } else {?>
                        <div class="text-danger font-weight-bold" style="font-size: 18px">Liên hệ</div>
                        <?php } ?>
                        <div class="desc"><?php echo $product->description ?></div>
                        <ul class="pro-properties clearfix">
                            <li><strong>Mã sản phẩm : </strong><?php echo $product->id ?></li>
                            <li><strong>Trạng thái :
                                </strong><?php echo $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' ?></li>
                        </ul>
                        <div class="pro-quantity">
                            <span>Số lượng :</span>
                            <div class="i-number">
                                <button class="n-ctrl down smooth"></button>
                                <input type="text" class="numberic" min="1" max="1000" value="1">
                                <button class="n-ctrl up smooth"></button>
                            </div>
                        </div>
                        <div class="btn-addcart">
                            <a href="" title="">Thêm vào giỏ hàng</a>
                        </div>
                        <div class="pro-socials">
                            <span>Chia sẻ : </span>
                            <ul>
                                <li><a href="" title=""><i class="social_facebook"></i></a></li>
                                <li><a href="" title=""><i class="social_twitter"></i></a></li>
                                <li><a href="" title=""><i class="social_googleplus"></i></a></li>
                                <li><a href="" title=""><i class="social_youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-intro">
                <h3 class="title">Thông tin sản phẩm</h3>
                <div class="s-content">
                    <?php echo $product->content ?>
                </div>
            </div>
        </div>
        <div class="product-related">
            <h3 class="head">Sản phẩm liên quan</h3>
            <div class="sl-pro-related owl-carousel">
                <?php foreach($related as $key => $val) { ?>
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
                                title=""><?php echo $val->title ?></a></h3>
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
                        <a href="#" title="" class="add-cart btn-crt"><i class="fa fa-cart-plus"></i></a>
                        <a href="product/<?php echo $val->id ?>" title="" class="view-details btn-crt"><i
                                class="fa fa-external-link"></i></a>
                        <a href="product/<?php echo $val->id ?>" class="link"></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>