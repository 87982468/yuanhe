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
                        <div class="pro-intro-items">
                            <div class="pro-assets-wrap">
                                <img width="825" height="91" src="<?=base_url().setting('attachment_dir').$detail->adv?>" alt=""/>
                            </div>
                            <div id="proChanceFind" class="pro-chance-wrap">
                                <?php foreach ($resources_classes as $key => $value): ?>
                                    <?php foreach($value['sub_classid'] as $k => $v) : ?>
                                    <div class="chance-waiting-items <?php if($key||$k) echo 'none';?>">
                                        <div class="pro-chance-main clearfix">
                                            <div class="pro-chance-noallow">
                                                <div class="chance-noallow-inner">
                                                    <div class="chance-noallow-title">
                                                        <h1><?=$v->intro_title?></h1>
                                                    </div>
                                                    <div class="chance-noallow-content">
                                                        <p><?=$v->intro?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pro-chance-start">
                                                <ul class="chance-start-list">
                                                    <!--状态:0=敬请期待,1=现已结束,2=火热进行中-->
                                                    <?php if(!empty($resources_lists[$v->classid])): ?>
                                                    <?php foreach ($resources_lists[$v->classid] as $list): ?>
                                                    <li>
                                                        <div class="chance-start-common chance-start-img"><img width="69" height="54" src="<?=base_url().setting('attachment_dir').$list->cover?>" alt=""/></div>
                                                        <div class="chance-start-common chance-start-txt">
                                                            <p><a href="<?=base_url()?>resources/detail/<?=$list->id?>" style="color:#333"><?=$list->title?></a></p>
                                                        </div>
                                                        <div class="chance-start-common chance-start-join">
                                                            <?php if($list->static==2): ?>
                                                            <span class="chance-hot">火热进行中！<a class="start-join" href="<?=base_url()?>resources/detail/<?=$list->id?>">加入</a></span>
                                                            <?php elseif($list->static==1): ?>
                                                            <span class="chance-finish">现已结束！</span>
                                                            <?php else: ?>
                                                            <span class="chance-expect">敬请期待！</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </li>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>

                                <div class="pro-chance-nav">
                                    <dl class="pro-chance-model clearfix">
                                        <?php foreach ($resources_classes as $key => $value): ?>
                                        <dd>
                                            <div class="chance-model-name">
                                                <h1><?=$value['parent_classid']->title?></h1>
                                                <h2>价值发现</h2>
                                                <p>项目开发</p>
                                            </div>
                                            <div class="chance-model-doing <?php if($key) echo 'none';?>">
                                                <ul class="model-doing-list clearfix">
                                                    <?php foreach($value['sub_classid'] as $k => $v) : ?>
                                                    <li <?php if(!$k):?>class="on"<?php endif;?>>
                                                        <div class="model-doing-title"><div style="width:32px;padding-left:13px;"><?=$v->title?></div></div>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </dd>
                                        <?php endforeach; ?>
                                    </dl>
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