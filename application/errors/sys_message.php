<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>元合建设_农业，食品安全，安全食品，高效，高品质解决方案</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="keywords" content="农业，食品安全，安全食品，高效，高品质解决方案"/>
    <meta name="description" content="我们的使命是为日益增长的食物需求提供解决方案。我们立足于食品安全和安全食品领域，我们一直致力为农业生产提供的安全、高效、高品质的解决方案"/>
    <base href="<?php echo base_url().'templates/'; ?>"/>
    <link rel="stylesheet" type="text/css" href="css/www_common.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/www_product.css" media="all"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src=""></script>
</head>
<body>
<section class="js-pro-wrap wrap-box clearfix">

    <div class="js-pro-main">
        <div class="about-main-inner" style="margin: 200px auto; width: 500px;white-space:nowrap;">
            <div class="about-content-wrap">
                <div class="about-title-wrap">
                    <h1><?php echo $message; ?></h1>
                </div>
                <div class="about-more" style="float:right;padding-top:60px">
                    <script>
                    function redirect($url)
                    {
                        location = $url;
                    }
                    setTimeout("redirect('<?php echo $location; ?>');", 5000);
                    </script>
                    <div class="about-more-title">
                        <a href="<?php echo $location; ?>" style="color:red;text-decoration:underline">页面正在自动转向，你也可以点此直接跳转 >></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/main-->
</section>
<!--/container-->
<?php include FCPATH . 'templates/footer.php' ?>
<!--/footer-->
<script type="text/javascript" src="js/init/www_product.init.js"></script>
</body>
</html>