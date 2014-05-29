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
                <li class="on"><a href="#">联系合作</a><i class="nav-triangle"></i></li>
            </ul>
        </nav>
        <?php include 'proSider.php' ?>
    </div>
    <!--/sider-->
    <div class="js-pro-main">
        <div class="contact-main-inner">
            <div class="contact-map-wrap clearfix">
                <div class="contact-map-img"><img src="images/contact/contact-img-01.jpg" alt=""/></div>
                <div class="contact-map-address">
                    <h1>上海元合建设管理有限公司</h1>
                    <div class="contact-map-info">
                        <p>公司地址：上海浦东竹林路101号基金大厦12F</p>
                        <p>邮政编码：200122</p>
                        <p>咨询电话：021-68889393</p>
                        <p>电子邮箱：he@yuanholdings.com</p>
                        <p>传真：021-68775353</p>
                    </div>
                </div>
            </div>
            <div class="contact-join-wrap">
                <div class="contact-join-title">
                    <h1>如果您有以下资源，欢迎加入合作</h1>
                    <p>选择你所拥有的资源（可多选），通过需求表单提交或发送电子邮件等方式与我们取得沟通!周一至周日全天竭诚为您服务。</p>
                </div>
                <?php echo form_open(base_url().'archives/do_message')?>
                <div class="contact-join-tab">
                    <table class="contact-join-tab" width="100%">
                        <tr>
                            <th width="490"><div class="xy-accordion-name contact-th-x">X</div></th>
                            <th width="185"><div class="xy-accordion-name contact-th-x">2</div></th>
                            <th><div class="xy-accordion-name contact-th-x">Y</div></th>
                        </tr>
                        <tr id="chance">
                            <?php foreach ($class_list as $key => $value): ?>
                            <td>
                                <ul class="contact-join-list clearfix">
                                    <?php foreach($value['sub_classid'] as $k => $v) : ?>
                                        <?php if($k): ?><li class="cdiv">|</li><?php endif; ?>
                                        <li classid="<?=$v->classid?>" <?php if(in_array($v->classid, $classids)): ?>class="on"<?php endif; ?>><?=$v->title?></li>
                                        <?php if(in_array($v->classid, $classids)): ?>
                                            <input type="hidden" name="classids[]" value="<?=$v->classid?>">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                    </table>
                </div>
                <div class="contact-msg-wrap">
                    <div class="contact-msg-content">
                        <br>
                        <ul class="contact-msg-list">
                            <li>
                                <dl class="contact-msg-items">
                                    <?php if($status != 1): ?>
                                        您还没有提交正确的公司资质证明，这将会导致您提交的资源信息不能及时得到我们审核。
                                        （<a href="<?=base_url().'login/me'?>" style="color:#c08e06">立即完善公司资质证明>></a>）
                                    <?php endif; ?>
                                </dl>
                            </li>
                            <li>
                                <dl class="contact-msg-items">
                                    <dd class="msg-txt">
                                        <i class="msg-required">*</i><label class="msg-bal">介绍您的资源</label>
                                        <textarea class="msg-items-txt" name="message" id="" cols="30" rows="10" style="width:600px;margin:10px 0 0 20px"><?=$message?></textarea>
                                    </dd>
                                    <dd class="msg-end">
                                        <input class="msg-submit" type="reset" value="取消"/>
                                        <input class="msg-cancel" type="submit" value="提交"/>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
    <!--/main-->
</section>
<!--/container-->
<?php include 'footer.php' ?>
<!--/footer-->
<script type="text/javascript" src="js/libs/jquery-1.8.3.min.js"></script>
<script>
jQuery(function($){
    $("#chance li").click(function(){
        classid = $(this).attr("classid");
        if($(this).hasClass("on"))
        {
            $(this).removeClass("on").next().remove();
        }
        else
        {
            $(this).addClass("on").after('<input type="hidden" name="classids[]" value="'+ classid +'">');
        }
    });
});
</script>
</body>
</html>