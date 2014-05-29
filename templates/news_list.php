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
                    <h1>新闻动态</h1>
                    <h2>news</h2>
                </div>
            </div>
        </div>
        <nav class="pro-sider-menu">
            <ul class="sider-nav-list">
                <?php foreach($class_list as $v) : ?>
                    <li <?php if($subclassid==$v->classid):?>class="on"<?php endif;?>><a href="<?=base_url()?>news/lists/<?=$classid?>/<?=$v->classid?>"><?=$v->title?></a><i class="nav-triangle"></i></li>
                <?php endforeach; ?>
            </ul>
            <div class="sider-back-left"><a class="back-left-link" href="<?=base_url()?>news/"><i class="back-left-flag">&lt;</i><span>返回上一级</span></a></div>
        </nav>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main news-main">
        <div class="news-main-inner">
            <ul class="news-list-items">
                <?php foreach($list as $v) : ?>
                    <li>
                        <a class="news-list-link" href="<?=base_url()?>news/detail/<?=$v->id?>">
                            <div class="news-list-img"><img width="150" height="105" alt="" src="<?=base_url().setting('attachment_dir').$v->cover?>"></div>
                            <div class="news-list-info">
                                <div class="news-info-title">
                                    <h1><?=$v->title?></h1>
                                </div>
                                <div class="news-info-main">
                                    <p><?=$v->intro?></p>
                                </div>
                                <div class="news-info-time">
                                    <time class="list-time"><?=date('Y-m-d',$v->create_time)?></time>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?=$page?>
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