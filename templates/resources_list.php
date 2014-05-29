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
                <li class="on"><a href="<?=base_url()?>resources/">资源库</a><i class="nav-triangle"></i></li>
                <li><a href="<?=base_url()?>companies/">公司库</a><i class="nav-triangle"></i></li>
            </ul>
        </nav>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main">
        <div class="res-main-inner">
            <div class="res-main-search clearfix">
                <div class="main-search-wrap clearfix">
                    <label class="main-search-lab" for="">资源库</label>
                    <!--<div class="main-search-outer">
                        <input class="main-search-input" type="text" name="" id=""/><input class="main-search-btn" type="button" value=""/>
                    </div>-->
                </div>
                <div class="res-view-wrap">
                    <div class="res-link-wrap clearfix">
                        <a class="res-link-all" href="<?=base_url()?>resources/">全部显示</a><a class="res-link-time" href="<?=base_url()?>resources/index/<?=$classid?>/1">按时间正序显示</a>
                    </div>
                </div>
            </div>
            <div id="resMainContent" class="res-main-content">
                <nav class="res-main-nav">
                    <dl class="res-main-items clearfix">
                        <?php foreach ($class_list as $key => $value): ?>
                            <dt><div class="res-main-name"><?=$value['parent_classid']->title?></div></dt>
                            <dd>
                                <ul class="res-main-list clearfix">
                                    <?php foreach($value['sub_classid'] as $v) : ?>
                                        <a href="<?=base_url()?>resources/index/<?=$v->classid?>">
                                            <li <?php if($classid==$v->classid):?>class="on"<?php endif;?>>
                                                <div class="res-plan-name"><?=$v->title?></div>
                                                <div class="res-plan-num">（<?=$v->counts?>）</div>
                                                <i class="res-plan-flag"></i>
                                            </li>
                                        </a>
                                    <?php endforeach; ?>
                                </ul>
                            </dd>
                        <?php endforeach; ?>
                    </dl>
                </nav>
                <div class="res-chance-content">
                    <div class="res-chance-items">
                        <ul class="news-list-items">
                            <?php foreach($list as $v) : ?>
                                <li>
                                    <a class="news-list-link" href="<?=base_url()?>resources/detail/<?=$v->id?>">
                                        <div class="news-list-img"><img width="150" height="105" alt="" src="<?=base_url().setting('attachment_dir').$v->cover?>"></div>
                                        <div class="news-list-info">
                                            <div class="news-info-title">
                                                <h1><?=$v->company_name?>/<?=$v->title?></h1>
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
            </div>
        </div>
    </div>
    <!--/main-->
</section>
<!--/container-->
<?php include 'footer.php' ?>
<!--/footer-->
<!--<script type="text/javascript" src="js/init/www_product.init.js"></script>-->
</body>
</html>