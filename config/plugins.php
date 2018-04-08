<?php
/**
 * Created by PhpStorm.
 * User: Change   插件营销集合
 * Date: 2018/3/3 0003
 * Time: 下午 3:12
 */
$plugin['business'] = [
    'title'=>'业务类',
    'children'=>[
        ['title'=>'供应商','logo'=>'/images/plugins/supplier.jpg','url'=>'/supplier/list','label'=>'supplier'],
        ['title'=>'促销活动','logo'=>'/images/plugins/promotion.jpg','url'=>'/promotion/list','label'=>'promotion'],
    ]
];
return $plugin;