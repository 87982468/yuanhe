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
                        <div class="pro-state-wrap">
                            <div id="proStateNav" class="pro-state-items">
                                <?php foreach ($projects_list as $k => $project): ?>
                                    <div class="pro-zixi-items <?php if($k) echo 'none' ?>">
                                        <div class="pro-state-main">
                                            <div class="state-main-inner">
                                                <a class="state-main-link clearfix" href="<?=base_url()?>projects/detail/<?=$project->id?>">
                                                    <div class="state-main-img"><img widht="200" height="150" src="<?=base_url().setting('attachment_dir').$project->cover?>" alt=""/></div>
                                                    <div class="state-main-info">
                                                        <div class="state-info-title">
                                                            <h1><?=$project->title?></h1>
                                                        </div>
                                                        <div class="state-info-content">
                                                            <p><?=$project->intro?></p>
                                                        </div>
                                                    </div>
                                                    <span class="state-main-more">查<br>看<br>详<br>细<i class="state-flag">&gt;</i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                <div class="pro-state-nav clearfix">
                                    <div class="pro-state-project">
                                        <div class="state-project-name"><span class="state-project-pro">产品项目</span>
                                            <a class="btnLeft state-left state-pro-btn" href="<?=base_url()?>products/project/<?=$id?>/<?=$page-1?>">&lt;</a>
                                        </div>
                                    </div>
                                    <div class="pro-state-slide">
                                        <div class="state-slide-inner">
                                            <ul class="pro-state-list clearfix" id="project_title_list">
                                                <?php foreach ($projects_list as $k => $project): ?>
                                                    <li <?php if(!$k) echo 'class="on"' ?>>
                                                        <div class="state-list-title">
                                                            <h1><?php echo $project->title; ?></h1>
                                                            <h2><?php echo $project->begin_time; ?></h2>
                                                        </div>
                                                    </li>
                                                <?php endforeach ?>
                                                <?php for ($i=0; $i < 5-count($projects_list) ; $i++) { ?>
                                                    <li><div class="state-list-title" style="padding:90px 0 0;background:none"><h1><h1></div></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <a class="btnRight state-right state-pro-btn" href="<?=base_url()?>products/project/<?=$id?>/<?=$page+1?>">&gt;</a>
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