<!DOCTYPE html>
<html lang="en">

<head>
    <?php global $APP_URL; ?>
    <base href="<?php echo $APP_URL ?>/clothes">
    <!-- Note: khai báo đường dẫn tới components của admin -->
    <?php $COMPONENT_URL = "view/base/admin/components/" ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link href="public/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <link href="public/backend/css/sb-admin-2.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" defer></script>
    <script src="public/backend/vendor/jquery/jquery.min.js" defer></script>
    <script src="public/backend/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
    <script src="public/backend/vendor/jquery-easing/jquery.easing.min.js" defer></script>
    <script src="public/backend/js/sb-admin-2.js" defer></script>
    <script src="public/backend/ckeditor/ckeditor.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "{$COMPONENT_URL}/sidebar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div>
                <?php include "{$COMPONENT_URL}/topnav.php"; ?>
                <!-- Note: Nội dung được đổ ra ở đây -->
                <?php echo $this->content; ?>
            </div>
            <?php include "{$COMPONENT_URL}/footer.php"; ?>
        </div>
    </div>
    <?php include "{$COMPONENT_URL}/scroll-button.php"; ?>
    <?php include "{$COMPONENT_URL}/logout-modal.php"; ?>
</body>

</html>