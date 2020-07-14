<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Note: khai báo đường dẫn tới components của admin -->
    <?php global $APP_URL; ?>
    <?php $COMPONENT_URL = "view/base/client/components/"?>
    <base href="<?php echo $APP_URL ?>/clothes">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="public/frontend/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
    <link href="public/frontend/fonts/elegantIcon/elegantIcon.css" type="text/css" rel="stylesheet">
    <link href="public/frontend/fonts/Linearicons-Free/Linearicons-Free.css" type="text/css" rel="stylesheet">
    <link href="public/frontend/css/owl.carousel.min.css" type="text/css" rel="stylesheet">
    <link href="public/frontend/css/main.css" type="text/css" rel="stylesheet">
    <script src="public/frontend/js/jquery.js" defer></script>
    <script src="public/frontend/js/bootstrap.min.js" defer></script>
    <script src="public/frontend/js/popper.min.js"></script>
    <script src="public/frontend/js/owl.carousel.min.js" defer></script>
    <script src="public/frontend/js/wow.min.js" defer></script>
    <script src="public/frontend/js/scrollspy.js" defer></script>
    <script src="public/frontend/js/jquery.sticky-kit.js" defer></script>
    <script src="public/frontend/js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" defer></script>
    <script src="public/frontend/js/custom.js" defer></script>
</head>

<body>
    <?php include "{$COMPONENT_URL}/loading.php"; ?>
    <div class="wrap">
        <a href="" title="" id="open-cart" class="icon-cart" data-toggle="modal" data-target="#pu-cart">
            <i class="fa fa-shopping-cart"></i>
            <span></span>
        </a>
        <?php include "{$COMPONENT_URL}/header.php"; ?>
        <!-- Note: đổ dữ liệu các trang -->
        <?php
                echo $this->content;
            ?>
        <?php include "{$COMPONENT_URL}/new-letter.php"; ?>
        <?php include "{$COMPONENT_URL}/footer.php"; ?>

    </div>
    <?php include "{$COMPONENT_URL}/popup-login.php"; ?>
    <?php include "{$COMPONENT_URL}/popup-cart.php"; ?>
    <!-- <script>
    ! function(s, u, b, i, z) {
        var r, m;
        s[i] || (s._sbzaccid = z, s[i] = function() {
            s[i].q.push(arguments)
        }, s[i].q = [], s[i]("setAccount", z), r = function(e) {
            return e <= 6 ? 5 : r(e - 1) + r(e - 3)
        }, (m = function(e) {
            var t, n, c;
            5 < e || s._subiz_init_2094850928430 || (t = "https://", t += 0 === e ? "widget." + i + ".xyz" :
                1 === e ? "storage.googleapis.com" : "sbz-" + r(10 + e) + ".com", t +=
                "/sbz/app.js?accid=" + z, n = u.createElement(b), c = u.getElementsByTagName(b)[0], n
                .async = 1, n.src = t, c.parentNode.insertBefore(n, c), setTimeout(m, 2e3, e + 1))
        })(0))
    }(window, document, "script", "subiz", "acqsgdjhqqlaxhusaovu");
    </script> -->
</body>

</html>