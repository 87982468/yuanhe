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
                    <li><a href="<?=base_url()?>news/lists/<?=$v->classid?>"><?=$v->title?></a><i class="nav-triangle"></i></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main hots-detail-main">
        <div class="news-main-inner">
            <div class="hots-main-wrap">
                <div class="hots-recommend-title">
                    <h1>热点推荐</h1>
                </div>
                <div class="hots-recommend-content clearfix">
                    <a href="<?=base_url()?>news/detail/<?=$detail->id?>">
                        <div class="hots-recommend-img"><img width="270" height="179" src="<?=base_url().setting('attachment_dir').$detail->cover?>" alt=""/></div>
                        <div class="hots-recommend-info">
                            <div class="recommend-info-title">
                                <h1><?=$detail->title?></h1>
                            </div>
                            <div class="recommend-info-content">
                                <p><?=$detail->intro?></p>
                            </div>
                            <div class="recommend-info-time">
                                <time class="recommend-time"><?=date('Y-m-d',$detail->update_time)?></time>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="hots-recommend-list">
                    <ul class="hots-list-wrap clearfix">
                        <?php foreach($index_list as $v) : ?>
                            <li>
                                <a class="hots-list-link" href="<?=base_url()?>news/detail/<?=$v->id?>">
                                    <div class="hots-list-img"><img width="125" height="96" src="<?=base_url().setting('attachment_dir').$v->cover?>" alt=""/></div>
                                    <div class="hots-list-info">
                                        <div class="hots-list-title">
                                            <h1><?=$v->title?></h1>
                                        </div>
                                        <div class="hots-list-content">
                                            <p><?=$v->intro?></p>
                                        </div>
                                        <div class="hots-list-time">
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

        </div>
    </div>
    <!--/main-->
</section>
<!--/container-->
<?php include 'footer.php' ?>
<!--/footer-->
<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<script type="text/javascript" src="js/init/www_product.init.js"></script>
</body>
</html>