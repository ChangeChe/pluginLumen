<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/3/3 0003
 * Time: 下午 5:14
 */
$menus['supplier'] = [
    'title'=>'供应商',
    'children'=>[
        ['title'=>'供应商管理','url'=>'/supplier/list']
    ]
];
$menus['promition'] = [
    'title'=>'促销管理',
    'children'=>[
        ['title'=>'促销中','url'=>'/promotion/list/1'],
        ['title'=>'已售罄','url'=>'/promotion/list/2'],
        ['title'=>'促销结果','url'=>'/promotion/record'],
        ['title'=>'提货订单','url'=>'/promotion/order']
    ]
];
return $menus;