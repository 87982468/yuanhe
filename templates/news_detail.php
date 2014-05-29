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
    <div class="js-pro-main news-detail-main">
        <div class="news-main-inner">
            <?php if($detail): ?>
            <div class="js-detail-top">
                <div class="js-detail-title">
                    <h1><?=$detail->title?></h1>
                </div>
                <div class="js-detail-sub clearfix">
                    <div class="detail-date-wrap"><time class="js-detail-date"><?=date('Y-m-d',$detail->create_time)?></time><i class="js-detail-line">|</i></div>
                    <div data="{'url':''}" class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
                        <span class="bds_more">分享到：</span>
                        <a title="分享到新浪微博" class="bds_tsina" href="#"></a>
                        <a title="分享到QQ空间" class="bds_tqq" href="#"></a>
                        <a title="分享到腾讯微博" class="bds_renren" href="#"></a>
                        <a title="分享到人人网" class="bds_qzone" href="#"></a>
                    </div>
                </div>
                <div class="news-detail-digest">
                    <?php if(isset($recommend)): ?>
                        <ul class="detail-digest-list clearfix">
                            <?php foreach($recommend as $v) : ?>
                                <li>
                                    <a class="detail-digest-link" href="<?=base_url()?>news/detail/<?=$v->id?>">
                                        <div class="detail-digest-img"><img width="65" height="65" src="<?=base_url().setting('attachment_dir').$v->cover?>" alt=""/></div>
                                        <div class="detail-digest-info">
                                            <h1><?=$v->title?></h1>
                                            <p><?=date('Y-m-d',$v->create_time)?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="js-detail-major"><?=$detail->info?></div>
            <div class="js-detail-bottom">
                <div class="js-detail-page clearfix">
                    <div class="detail-page-prev">
                        <span class="page-name">上一篇：</span>
                        <?php if($pre_news): ?>
                            <a href="<?=base_url()?>news/detail/<?=$pre_news->id?>" class="detail-page-link"><?=$pre_news->title?></a>
                        <?php else: ?>
                            没有上一篇
                        <?php endif; ?>
                    </div>
                    <div class="detail-page-next">
                        <span class="page-name">下一篇：</span>
                        <?php if($next_news): ?>
                            <a href="<?=base_url()?>news/detail/<?=$next_news->id?>" class="detail-page-link"><?=$next_news->title?></a>
                        <?php else: ?>
                            没有下一篇
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
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