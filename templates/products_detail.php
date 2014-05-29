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
                    <h1>在线产品</h1>
                    <h2>program</h2>
                </div>
            </div>
        </div>
        <nav class="pro-sider-menu">
            <ul class="sider-nav-list">
                <?php foreach($list as $v) : ?>
                    <li <?php if($id==$v->id):?>class="on"<?php endif;?>><a href="<?=base_url()?>products/detail/<?=$v->id?>"><?=$v->title?></a><i class="nav-triangle"></i></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main">
        <div class="pro-main-inner">
            <div class="pro-main-banner"><img src="images/product/pro-newtown-01.jpg" alt=""/></div>
            <div class="pro-main-content">
                <div id="proIntroMenu" class="pro-intro-wrap">
                    <div class="pro-intro-menu">
                        <ul class="intro-menu-list clearfix">
                            <li <?php if($method=='detail'): ?>class="on"<?php endif; ?>><a href="<?=base_url()?>products/detail/<?=$detail->id?>">产品介绍</a><i class="intro-flag"></i><i class="mdiv"></i></li>
                            <li <?php if($method=='project'): ?>class="on"<?php endif; ?>><a href="<?=base_url()?>products/project/<?=$detail->id?>">产品动态</a><i class="intro-flag"></i><i class="intro-news"></i><i class="mdiv"></i></li>
                            <li <?php if($method=='resource'): ?>class="on"<?php endif; ?>><a href="<?=base_url()?>products/resource/<?=$detail->id?>">产品资源库</a><i class="intro-flag"></i><i class="intro-resnum">可配置资源<?=$resources_counts?>项</i></li>
                        </ul>
                    </div>
                    <div class="pro-intro-content">
                        <div class="pro-intro-items">
                            <?php if($detail): ?>
                            <div class="pro-assets-wrap">
                                <img width="825" height="91" src="<?=base_url().setting('attachment_dir').$detail->adv?>" alt=""/>
                            </div>
                            <div class="pro-location-wrap clearfix">
                                <div class="pro-location-img">
                                    <a href="<?=base_url()?>products/albums/<?=$detail->id?>" target="_blank"><img width="203" height="245" src="<?=base_url().setting('attachment_dir').$detail->cover?>" alt=""/></a>
                                </div>
                                <div class="pro-location-info">
                                    <div class="location-info-content">
										<?=$detail->info?>
                                    </div>
                                    <div class="pro-location-put clearfix">
                                        <div class="pro-location-view clearfix">
                                            <a class="location-view-link" href="<?=base_url()?>products/project/<?=$detail->id?>">查看产品动态<i class="view-link-flag">&gt;</i></a><a class="location-view-link" href="<?=base_url()?>products/resource/<?=$detail->id?>">查看资源配置<i class="view-link-flag">&gt;</i></a>
                                        </div>
                                        <div class="pro-location-conn"><a class="location-conn-link" href="<?=base_url()?>archives/contact">联系合作<span class="conn-line"><i class="view-link-flag conn-link">&gt;</i></span><i class="view-single"></i></a></div>
                                    </div>
                                </div>

                            </div>
                            <?php endif; ?>
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