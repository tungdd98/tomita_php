<div class="certifi-home">
    <div class="container">
        <h3 class="head-primary">Sản phẩm mới nhất</h3>
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
                        <h3 class="title"><a href="product/<?php echo $val->id ?>"
                                title=""><?php echo $val->title ?></a>
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
                    </div>
                    <?php if($val->sale > 0) {?>
                    <span class="sales">-<?php echo $val->sale ?>%</span>
                    <?php }?>
                    <div class="control">
                        <?php if($val->price != 0) { ?>
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
        <h3 class="head-primary">Chứng chỉ & chứng nhận
            <span>100% sản phẩm có nguồn gốc xuất xứ rõ ràng, có chứng nhận/chứng chỉ.</span>
        </h3>
        <div class="sl-certifi owl-carousel">
            <a href="" title="" class="item"><img src="public/frontend/images/certifi1.png" alt=""></a>
            <a href="" title="" class="item"><img src="public/frontend/images/certifi2.png" alt=""></a>
            <a href="" title="" class="item"><img src="public/frontend/images/certifi3.png" alt=""></a>
            <a href="" title="" class="item"><img src="public/frontend/images/certifi4.png" alt=""></a>
            <a href="" title="" class="item"><img src="public/frontend/images/certifi5.png" alt=""></a>
            <a href="" title="" class="item"><img src="public/frontend/images/certifi5.png" alt=""></a>
        </div>
    </div>
</div>
<section class="support-home">
    <div class="container">
        <div class="list-item">
            <div class="item-sup-home">
                <img src="public/frontend/images/ic-sp-home1.png" alt="">
                <h3 class="title">Hệ thống cửa hàng</h3>
                <span class="desc">Danh sách các cửa hàng</span>
            </div>
            <div class="item-sup-home">
                <img src="public/frontend/images/ic-sp-home2.png" alt="">
                <h3 class="title">Trung tâm chăm sóc khách hàng</h3>
                <p class="desc"><span><i class="lnr lnr-phone-handset"></i> (+84) 243 200 1930 </span> | <span><i
                            class="lnr lnr-clock"></i> 08:00 - 17:00 từ Thứ 2 - Thứ 7</span></p>
            </div>
            <div class="item-sup-home">
                <img src="public/frontend/images/ic-sp-home3.png" alt="">
                <h3 class="title">Tomita Mart Membership</h3>
                <span class="desc">“Ưu đãi xứng tầm”</span>
            </div>
        </div>
    </div>
</section>
<section class="tomita-member">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="left">
                    <div class="title">
                        <strong>Tomita farm</strong>
                        <span>Family</span>
                    </div>
                    <img src="public/frontend/images/logo-member1.png" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="list-member">
                    <a href="" title=""><img src="public/frontend/images/logo-member2.png" alt=""></a>
                    <a href="" title=""><img src="public/frontend/images/logo-member3.png" alt=""></a>
                    <a href="" title=""><img src="public/frontend/images/logo-member4.png" alt=""></a>
                    <a href="" title=""><img src="public/frontend/images/logo-member5.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>