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
                    <h1>产品项目</h1>
                    <h2>program</h2>
                </div>
            </div>
        </div>
        <nav class="pro-sider-menu">
            <ul class="sider-nav-list">
    			<?php foreach($list as $v) : ?>
                    <li <?php if($id==$v->id):?>class="on"<?php endif;?>><a href="<?=base_url()?>projects/detail/<?=$v->id?>"><?=$v->title?></a><i class="nav-triangle"></i></li>
                <?php endforeach; ?>
            </ul>
            <div class="sider-back-left"><a class="back-left-link" href="javascript:void(0)" onClick="location.back(-1)"><i class="back-left-flag">&lt;</i><span>返回上一级</span></a></div>
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
                            <li <?php if($method=='detail'): ?>class="on"<?php endif; ?>><a href="<?=base_url()?>projects/detail/<?=$detail->id?>">项目介绍</a><i class="intro-flag"></i><i class="mdiv"></i></li>
                            <li <?php if($method=='news'): ?>class="on"<?php endif; ?>><a href="<?=base_url()?>projects/news/<?=$detail->id?>">项目动态</a><i class="intro-flag"></i><i class="intro-news"></i><i class="mdiv"></i></li>
                            <li <?php if($method=='resource'): ?>class="on"<?php endif; ?>><a href="<?=base_url()?>projects/resource/<?=$detail->id?>">项目资源配置</a><i class="intro-flag"></i><i class="intro-resnum">可配置资源<?=$resources_counts?>项</i></li>
                        </ul>
                    </div>
                    <div class="pro-intro-content">
                        <div class="pro-intro-items">
                            <div class="pro-assets-wrap">
                                <img width="825" height="91" src="<?=base_url().setting('attachment_dir').$detail->adv?>" alt=""/>
                            </div>
                            <div id="proChanceFind" class="pro-chance-wrap">
                                <?php $i=0; ?>
                                <?php if($resources_lists): ?>
                                <?php foreach ($resources_lists as $key => $value): ?>
                                <?php if(is_object($value)): ?>
                                    <div class="chance-waiting-items <?php if($i++) echo 'none';?>">
                                        <div class="project-res-main">
                                            <div class="project-res-inner clearfix">
                                                <div class="res-main-img"><img width="200" height="150" src="<?=base_url().setting('attachment_dir').$value->cover?>" alt=""/></div>
                                                <div class="res-main-desc">
                                                    <div class="res-main-title">
                                                        <a href="<?=base_url()?>resources/detail/<?=$value->id?>" style="color:#333"><h1><?=$value->title?></h1></a>
                                                    </div>
                                                    <div class="res-main-info">
                                                        <p><?=$value->intro?></p>
                                                        <div class="res-main-join">
                                                            <a class="main-join-us" href="<?=base_url()?>archives/contact">加入我们<i class="join-us-flag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="chance-waiting-items <?php if($i++) echo 'none';?>"><div class="project-res-main" style="height:190px"></div></div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
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
    </div>
    <!--/main-->
</section>
<!--/container-->
<?php include 'footer.php' ?>
<!--/footer-->
<script type="text/javascript" src="js/init/www_product.init.js"></script>
</body>
</html>