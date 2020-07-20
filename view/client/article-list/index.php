<section class="bn-page mgt">
    <img src="public/frontend/images/bn-news.jpg" alt="">
</section>

<section class="page-news page-primary">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/clothes">Trang chủ</a></li>
            </ol>
        </nav>
        <h2 class="head-primary v2">Tin tức & sự kiện</h2>
        <div class="list-news">
            <div class="row">
                <?php foreach($articles as $key => $val) {?>
                <div class="col-md-6">
                    <div class="item-news">
                        <a href="article/<?php echo $val->id ?>" title="" class="img-primary">
                            <?php if(file_exists("public/upload/article/" . $val->thumbnail) && !empty($val->thumbnail)) { ?>
                            <img src="public/upload/article/<?php echo $val->thumbnail; ?>" style="max-height: 300px; object-fit: cover">
                            <?php } else {; ?>
                            <img src="public/upload/no-image.jpg" style="max-height: 300px; object-fit: cover">
                            <?php } ?>
                        </a>
                        <div class="ct">
                            <h3 class="title"><a href="article/<?php echo $val->id ?>" title=""><?php echo $val->title ?></a></h3>
                            <div class="desc"><?php echo $val->description ?></div>
                            <div class="control">
                                <span class="time"><i class="icon_clock_alt"></i> <?php echo $val->created_at ?></span>
                                <a href="" title="" class="btn-view-dt">Xem chi tiết <i class="arrow_right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>