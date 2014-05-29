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
    <div class="js-pro-sider">
        <div class="pro-sider-logo">
            <div class="sider-logo-inner">
                <div class="top-search-title clearfix">
                    <h1><a href="<?php echo base_url(); ?>"><img src="images/common/yhjs-logo.png" alt=""/></a></h1>
                </div>
                <div class="pro-sider-back">
                    <h1>开发资源库</h1>
                    <h2>Resources</h2>
                </div>
            </div>
        </div>
        <nav class="pro-sider-menu">
            <ul class="sider-nav-list">
                <li><a href="<?=base_url()?>resources/">资源库</a><i class="nav-triangle"></i></li>
                <li class="on"><a href="<?=base_url()?>companies/">公司库</a><i class="nav-triangle"></i></li>
            </ul>
            <div class="sider-back-left"><a class="back-left-link" href="javascript:void(0)" onClick="history.back()"><i class="back-left-flag">&lt;</i><span>返回上一级</span></a></div>
        </nav>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main">
        <div class="pro-main-inner">
            <div class="pro-main-banner"><img src="images/library/library-banner-01.jpg" alt=""/></div>
            <div class="pro-main-content">
                <div id="proIntroMenu" class="pro-intro-wrap">
                    <div class="pro-intro-menu">
                        <ul class="intro-menu-list clearfix">
                            <li class="on"><a href="<?=base_url()?>companies/detail/<?=$detail->id?>">公司介绍</a><i class="intro-flag"></i><i class="mdiv"></i></li>
                            <li><a href="<?=base_url()?>companies/project/<?=$detail->id?>">案例库</a><i class="intro-flag"></i><i class="mdiv"></i></li>
                            <li><a href="<?=base_url()?>companies/resource/<?=$detail->id?>">资源列表</a><i class="intro-flag"></i></li>
                        </ul>
                    </div>
                    <div class="pro-intro-content">
                        <div class="pro-intro-items">
                            <div class="lib-intro-wrap clearfix">
                                <div class="lib-intro-img">
                                    <div class="company-intro-top"><img src="images/library/library-img-01.jpg" alt=""/></div>
                                    <div class="company-intor-nav clearfix">
                                        <a class="company-intro-link" href="<?=base_url()?>companies/project/<?=$detail->id?>">
                                            <div class="view-case-inner">
                                                <p>查看</p>
                                                <h1>案例库</h1>
                                                <div class="view-case-flag">&gt;</div>
                                            </div>
                                        </a>
                                        <a class="company-intro-link" href="<?=base_url()?>companies/resource/<?=$detail->id?>">
                                            <div class="view-case-inner">
                                                <p>查看</p>
                                                <h1>资源列表</h1>
                                                <div class="view-case-flag">&gt;</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="lib-intro-main">
                                    <div class="lib-main-title">
                                        <h1><?=$detail->title?></h1>
                                    </div>
                                    <div class="lib-main-content">
                                        <p><?=$detail->info?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/main-->
</section>
<!--/container-->
<?php include 'footer.php' ?>
<!--/footer-->
<script type="text/javascript" src="js/init/www_product.init.js"></script>
</body>
</html>