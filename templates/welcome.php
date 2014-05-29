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

        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main">
        <div class="contact-main-inner">
            <div class="contact-join-wrap">
                <div class="contact-join-title">
                    <h1>如果您已经有帐号，请登录</h1>
                </div>
                <div class="contact-msg-wrap">
                    <div class="contact-msg-content">
                        <?=form_open(base_url().'login/do_login')?>
                        <ul class="contact-msg-list">
                            <li>
                                <dl class="contact-msg-items clearfix">
                                    <dd>
                                        <i class="msg-required">*</i><label class="msg-bal">手机号</label><input class="msg-items-input" type="text" name="tel" id="" value="<?=set_value('tel')?>" />
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="contact-msg-items clearfix">
                                    <dd>
                                        <i class="msg-required">*</i><label class="msg-bal">密码</label><input class="msg-items-input" type="password" name="password" id="" value="" />
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="contact-msg-items">
                                    <dd class="msg-end" style="height:auto">
                                        <input class="msg-cancel" type="submit" value="立即登录"/>
                                    </dd>
                                    <dd class="msg-end" style="height:auto">
                                        <input style="margin-bottom:0" class="msg-submit" type="reset" value="取消"/>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
<hr style="margin:50px 0">
            <div class="contact-join-wrap">
                <div class="contact-join-title">
                    <h1>如果您还没有帐号，请注册信息，欢迎加入合作</h1>
                </div>
                <div class="contact-msg-wrap">
                    <div class="contact-msg-content">
                        <?=form_open(base_url().'login/do_register')?>
                        <ul class="contact-msg-list">
                            <li>
                                <dl class="contact-msg-items clearfix">
                                    <dd>
                                        <i class="msg-required">*</i><label class="msg-bal">手机号</label><input class="msg-items-input" type="text" name="tel" id="" value="<?=set_value('tel')?>" />
                                    </dd>
                                    <dd>
                                        <i class="msg-required">*</i><label class="msg-bal">密码</label><input class="msg-items-input" type="password" name="password" id="" value="" />
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="contact-msg-items">
                                    <dd>
                                        <i class="msg-required">*</i><label class="msg-bal">邮箱</label><input class="msg-items-input" type="text" name="email" id="" value="<?=set_value('email')?>" />
                                    </dd>
                                    <dd>
                                        <i class="msg-required">*</i><label class="msg-bal">真实姓名</label><input class="msg-items-input" type="text" name="realname" id="" value="<?=set_value('realname')?>" />
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="contact-msg-items" style="float:right">
                                    <dd class="msg-end" style="height:auto">
                                        <input class="msg-cancel" type="submit" value="注册"/>
                                    </dd>
                                    <dd class="msg-end" style="height:auto">
                                        <input style="margin-bottom:0" class="msg-submit" type="reset" value="取消"/>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
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