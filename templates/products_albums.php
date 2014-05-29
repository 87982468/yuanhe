
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>元合新镇 > 产品说明_元合控股_元合基金,元合科技,建设管理,建设管理,城镇化,地产,基金,元合新镇</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
	<base href="http://www.yuanholdings.com/templets/default/" />
    <link type="text/css" rel="stylesheet" href="css/common.css" />
    <link type="text/css" rel="stylesheet" href="css/product.css" />
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body class="product-body">
<header class="product-header-wrap" style="background:#a17200">
    <div class="product-inner clearfix">
        <div class="product-logo-wrap">
            <h1><a href="/" title=""><img height="29" src="<?=base_url()?>templates/images/common/yhjs-logo.png"/></a></h1>
            <div class="product-sitemap-wrap yh-midmenu-sitemap">
                <p style="color:#fff"><?=$detail->title?></p>
            </div>
        </div>
    </div>
</header>
<!--/header-->
<section class="product-container">
    <div id="rg-gallery" class="rg-gallery">
	<div class="rg-image-wrapper">
            <div class="rg-caption-wrapper">
                <div class="rg-caption1">
                    <p></p>
                </div>
            </div>
            <div class="rg-image-nav">
                <a href="javascript:void(0)" class="rg-image-nav-prev">Previous Image</a>
                <a href="javascript:void(0)" class="rg-image-nav-next">Next Image</a>
            </div>
            <div class="rg-image"></div>
            <div class="rg-loading"></div>
        </div>
        <div class="rg-info-wrap clearfix">
            <div class="rg-info-num">
                <i class="info-current"></i>
                <i class="ffs">/</i>
                <i class="info-total"></i>
            </div>
            <div class="rg-info-txt">
                <p>提示：支持触摸屏滑动<i class="ffs">/</i>键盘翻页 <i class="ffs">←</i>左 右<i class="ffs">→</i></p>
            </div>
        </div>
        <div class="rg-thumbs">
            <div class="es-carousel-wrapper">
                <div class="es-nav">
                    <span class="es-nav-prev">Previous</span>
                    <span class="es-nav-next">Next</span>
                </div>
                <div class="es-carousel">
                    <ul>
                    <?php foreach ($albums_lists as $key => $value) : ?>
                        <?php $src = base_url().setting('attachment_dir').'/'.$value->folder.'/'.$value->name.'.'.$value->type; ?>
                       <li>
                            <a href="#"><img src="<?=$src?>" data-large="<?=$src?>" alt="<?=$value->realname?>" data-description="<?=$value->realname?>" /></a>
                            <div class="es-mask"></div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="yh-home-footer ">
    <div class="yh-homefoot-inner product-foot clearfix">
        <div class="yh-homefoot-copyright">
            <p>版权 &copy; 2013 元合控股有限公司版权所有 | 沪ICP备13037463号</p>
        </div>
        <div class="yh-homefoot-contact">
            <a href="/contact/" target="_blank" title="联系我们">联系我们</a>
        </div>
    </div>
</footer>
<!--/footer-->

<script type="text/javascript" src="js/init/product.init.js"></script>
</body>
</html>