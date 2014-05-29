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
        th,td{
            border: 1px solid #ccc;
            padding:10px;
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


    </div>
    <!--/sider-->
    <!--列表-->
    <?php if(! $this->uri->segment(3)): ?>
    <div class="js-pro-main">
        <div class="contact-main-inner">
            <div class="contact-join-wrap">
                <button onclick="location.href='<?=base_url()?>u/resources/add'">添加资源</button>
                <div class="contact-msg-wrap">
                    <div class="contact-msg-content">
                        <table width="100%">
                            <tr>
                                <th width="30%">标题</th>
                                <th>描述</th>
                                <th width="15%">更新时间</th>
                                <th width="15%">操作</th>
                            </tr>
                            <?php foreach($lists as $list): ?>
                            <tr>
                                <td>
                                    <?=$list->title?>
                                </td>
                                <td>
                                    <?=$list->intro?>
                                </td>
                                <td>
                                    <?=date('Y-m-d',$list->update_time)?>
                                </td>
                                <td>
                                    <a href="<?=base_url()?>resources/detail/<?=$list->id?>" target="_blank">访问</a> |
                                    <a href="<?=base_url()?>u/resources/edit/<?=$list->id?>">修改</a> |
                                    <a href="<?=base_url()?>u/resources/del/<?=$list->id?>">删除</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <!--修改-->
    <div class="js-pro-main">
        <div class="contact-main-inner">
            <div class="contact-join-wrap">
                <button onclick="location.href='<?=base_url()?>u/resources'">返回列表</button>
                <div class="contact-msg-wrap">
                    <div class="contact-msg-content">
                        <table width="100%">
                            <tr>
                                <td>资源名称 <input type="text" name="title" value="<?php echo isset($detail->title) ? $detail->title : '' ?>" size="60"></td>
                            </tr>
                            <tr>
                                <td>资源简介 <textarea><?php echo isset($detail->intro) ? $detail->intro : '' ?></textarea></td>
                            </tr>
                            <tr>
                                <td>资源介绍 <textarea name="info" id="info"><?php echo isset($detail->info) ? $detail->info : '' ?></textarea></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="" value="修改"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!--/main-->
</section>
<!--/container-->
<?php include FCPATH . 'templates/footer.php' ?>
<!--/footer-->
<script type="text/javascript" src="js/init/www_product.init.js"></script>
</body>
</html>