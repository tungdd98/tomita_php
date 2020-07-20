<section class="page-news-dt page-primary v2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $data->title ?></li>
            </ol>
        </nav>
        <div class="wrap-news-dt">
            <div class="row">
                <div class="col-lg-12">
                    <div class="details-news">
                        <h1 class="title-news"><?php echo $data->title ?></h1>
                        <div class="control">
                            <span class="time"><i class="icon_clock_alt"></i> <?php echo $data->created_at ?></span>
                        </div>
                        <div class="desc">
                            <?php echo $data->description ?>
                        </div>
                        <div class="s-content">
                        <?php echo $data->content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>