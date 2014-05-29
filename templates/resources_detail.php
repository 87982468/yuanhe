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
                <li class="on"><a href="<?=base_url()?>resources/">资源库</a><i class="nav-triangle"></i></li>
                <li><a href="<?=base_url()?>companies/">公司库</a><i class="nav-triangle"></i></li>
            </ul>
            <div class="sider-back-left"><a class="back-left-link" href="javascript:void(0)" onClick="history.back()"><i class="back-left-flag">&lt;</i><span>返回上一级</span></a></div>
        </nav>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main">
        <div class="res-detail-inner">
            <?php if($detail): ?>
            <div class="res-detail-title">
                <h1><?=$detail->title?></h1>
                <h2><?=date('Y-m-d',$detail->create_time)?></h2>
            </div>
            <div class="res-detail-flag clearfix">
                <?php foreach ($attributes as $key => $value) : ?>
                    <a href="javascript:;"><?=$value['title']?> : <?=$value['value']?></a>
                <?php endforeach; ?>
            </div>
            <div class="res-detail-img clearfix">
                <div class="res-img-wrap"><img width="257" height="175" src="<?=base_url().setting('attachment_dir').$detail->cover?>" alt=""/></div>
                <div class="res-img-info">
                    <p><?=$detail->info?></p>
                </div>
            </div>
            <div class="res-detail-intro">
                <div class="res-intro-items clearfix">
                    <div class="res-intro-name">公<br>司</div>
                    <div class="res-intro-main clearfix">
                        <div class="res-logo-outer">
                            <div class="res-intro-inner">
                                <div class="res-intro-info clearfix">
                                    <div class="res-intro-logo"><img width="86" height="77" src="<?=base_url().setting('attachment_dir').$company->cover?>" alt=""/></div>
                                    <div class="res-intro-txt">
                                        <h1><?=$company->title?></h1>
                                        <p><?=$company->intro?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="res-intro-view"><a class="res-intro-link" href="<?=base_url()?>companies/detail/<?=$company->id?>">查看公司</a></div>
                    </div>
                </div>
                <div class="res-intro-items clearfix">
                    <div class="res-intro-name">产<br>品</div>
                    <div class="res-intro-main clearfix">
                        <?php foreach ($products_list as $key => $product) : ?>
                            <div class="res-intro-product">
                                <a href="<?=base_url()?>products/detail/<?=$product->id?>"><img width="153" height="110" src="<?=base_url().setting('attachment_dir').$product->cover?>" alt=""/></a>
                                <i class="intro-product-title"><?=$product->title?></i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="res-intro-items clearfix">
                    <div class="res-intro-name">项<br>目</div>
                    <div class="res-intro-main">
                        <div class="res-intro-inner">
                            <div class="res-intro-town clearfix">
                                <?php foreach ($projects_list as $key => $project) : ?>
                                    <a href="<?=base_url()?>projects/detail/<?=$project->id?>"><?=$project->title?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
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
<script type="text/javascript" src="js/init/www_product.init.js"></script>
</body>
</html>