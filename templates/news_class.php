        <nav class="pro-sider-menu">
            <ul class="sider-nav-list">
                <?php foreach($class_list as $v) : ?>
                    <?php $_get = isset($subclassid) ? "{$classid}/{$v->classid}" : "{$v->classid}/{$classid}" ?>
                    <?php
                        if(! ($classid || $subclassid))
                        {
                           $_get = "{$v->classid}/";
                        }
                        elseif($classid && ! $subclassid)
                        {
                            $_get = "{$classid}/{$v->classid}/";
                        }
                    ?>
                    <li <?php if($subclassid==$v->classid):?>class="on"<?php endif;?>><a href="<?=base_url()?>news/lists/<?=$_get?>"><?=$v->title?></a><i class="nav-triangle"></i></li>
                <?php endforeach; ?>
            </ul>
            <?php if($classid): ?>
                <div class="sider-back-left"><a class="back-left-link" href="<?=base_url()?>news/"><i class="back-left-flag">&lt;</i><span>返回上一级</span></a></div>
            <?php endif; ?>
        </nav>
