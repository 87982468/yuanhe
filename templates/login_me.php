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
    <style type="text/css">
    .contact-msg-content{
        width: 500px;
        margin: 0 auto;
    }
    .contact-msg-content p{
        margin:25px 0;
        font-size: 20px
    }
    .contact-join-title h1, .contact-join-title h3{
        display: inline;
    }
    </style>
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
                    <h1>个人资料</h1>
                    <h2>Personal</h2>
                </div>
            </div>
        </div>
        <?php if($status == 1): ?>
        <nav class="pro-sider-menu">
            <ul class="sider-nav-list">
                <li><a href="<?=base_url()?>u/resources">管理我的资源</a><i class="nav-triangle"></i></li>
            </ul>
        </nav>
        <?php endif; ?>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main">
        <div class="contact-main-inner">
            <div class="contact-join-wrap">
                <div class="contact-join-title">
                    <h1>个人资料</h1>
                </div>
                <div class="contact-msg-wrap">
                    <div class="contact-msg-content">
                        <?=form_open_multipart(base_url().'login/do_verify')?>
                        <p>
                            手机号：<?=$tel?>
                        </p>
                        <p>
                            邮箱：<?=$email?>
                        </p>
                        <p>
                            真实姓名：<?=$realname?>
                        </p>
                    </div>
                </div>
                <div class="contact-join-title">
                    <h1>公司资质认证</h1>（<h3 style="color:red">
                        <?php if($status == 0): ?>未审核
                        <?php elseif($status == 1): ?>通过审核
                        <?php elseif($status == 2): ?>未通过审核
                        <?php endif; ?>
                    </h3>）
                        <?php if($status != 1): ?>
                            您也可以通过公司的微信、微博方式认证，编辑用户名和公司名发送至xxxx
                        <?php else: ?>
                            <a href="<?=base_url()?>u/resources">管理我的资源</a>
                        <?php endif; ?>
                </div>
                <div class="contact-msg-wrap">
                    <div class="contact-msg-content">
                        <p>
                            公司名称：
                            <?php if($status != 1): ?>
                                <input type="input" name="company" value="<?=$company_name?>" size="30">
                            <?php else: ?>
                                <?=$company_name?>
                            <?php endif; ?>
                        </p>
                        <p>
                            公司资质：
                            <?php if($status != 1): ?>
                                <input type="file" name="verify">
                            <?php endif; ?>
                            <br><a href="<?=base_url().setting('attachment_dir').$verify_img?>" target="_blank"><img width="200" height="200" src="<?=base_url().setting('attachment_dir').$verify_img?>"/></a>
                        </p>
                        <p>
                            <input type="submit" name="" value="修改资料" style="padding: 20px; background: #ff8a00; font-size: 18px; border: 0; color: #fff; font-family: '微软雅黑','黑体';cursor: pointer;">
                            <a href="<?=base_url().'archives/contact'?>" style="color:#585858;font-size:16px;margin-left:25px">我有资源，想加入合作 >></a>
                        </p>
                        <?=form_close()?>
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