<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/2/5 0005
 * Time: 下午 9:34
 */
$menus['perm'] = [
    'title'=>'权限',
    'icon'=>'fa-cubes',
    'url'=>'',
    'children'=>[
        'perm.role'=>['title'=>'角色管理','icon'=>'fa-user-plus','url'=>'/admin/role'],
        'perm.admin'=>['title'=>'人员管理','icon'=>'fa-user-plus','url'=>'/admin/list'],
    ]
];
//the menus of system settings module
$menus['sysset'] = [
    'title'=>'设置',
    'icon'=>'fa-cog',
    'url'=>'',
    'children'=>[
        'sysset.params'=>['title'=>'基本参数','icon'=>'fa-paperclip','url'=>'/admin/sysset'],
        'sysset.poster'=>['title'=>'海报设计','icon'=>'fa-image','url'=>'/admin/poster']
    ]
];
$menus['shop'] = [
    'title'=>'商城',
    'icon'=>'fa-bank',
    'url'=>'',
    'children'=>[
        'shop.activity'=>['title'=>'首页活动区','icon'=>'fa-flag','url'=>'/admin/activity'],
        'shop.recommand'=>['title'=>'首页推荐','icon'=>'fa-flag','url'=>'/admin/group/post'],
        'shop.banner'=>['title'=>'轮播图','icon'=>'fa-image','url'=>'/admin/banner'],
        'shop.category'=>['title'=>'商品分类','icon'=>'fa-list','url'=>'/admin/category'],
        'shop.goods'=>['title'=>'商品','icon'=>'fa-gift','url'=>'/admin/goods','children'=>[
            'shop.goods.sale'=>['title'=>'出售中','url'=>'/admin/goods/list/1'],
            'shop.goods.nostock'=>['title'=>'已售罄','url'=>'/admin/goods/list/2'],
            'shop.goods.warehouse'=>['title'=>'仓库中','url'=>'/admin/goods/list/3'],
            'shop.goods.all'=>['title'=>'全部商品','url'=>'/admin/goods/list/all']
        ]],
        'shop.express'=>['title'=>'运费模板','icon'=>'fa-truck','url'=>'/admin/express'],
        'shop.comment'=>['title'=>'评论管理','icon'=>'fa-comments','url'=>'/admin/comment']
    ]
];
$menus['member'] = [
    'title'=>'会员',
    'icon'=>'fa-users',
    'url'=>'',
    'children'=>[
        'member.level'=>['title'=>'会员等级','icon'=>'fa-list','url'=>'/admin/level'],
        'member.note'=>['title'=>'等级说明','icon'=>'fa-file-word-o','url'=>'/admin/level/note'],
        'member.member'=>['title'=>'会员列表','icon'=>'fa-users','url'=>'/admin/member'],

    ]
];
$menus['order'] = [
    'title'=>'订单',
    'icon'=>'fa-file-text-o',
    'url'=>'',
    'children'=>[
        'order.order'=>['title'=>'订单列表','icon'=>'fa-list','url'=>'/admin/order','children'=>[
            'order.order.unsend'=>['title'=>'待发货','url'=>'/admin/order/list/1'],
            'order.order.unfinish'=>['title'=>'待收货','url'=>'/admin/order/list/2'],
            'order.order.finish'=>['title'=>'已完成','url'=>'/admin/order/list/3'],
            'order.order.unpay'=>['title'=>'待支付','url'=>'/admin/order/list/0'],
            'order.order.close'=>['title'=>'已关闭','url'=>'/admin/order/list/7'],
            'order.order.all'=>['title'=>'全部订单','url'=>'/admin/order/list/a']
        ]],
        'order.refund'=>['title'=>'维权','icon'=>'fa-exchange','url'=>'/admin/order/refunds']
    ]
];
$menus['finance'] = [
    'title'=>'佣金',
    'icon'=>'fa-money',
    'url'=>'',
    'children'=>[
        'finance.logs'=>['title'=>'佣金流水','icon'=>'fa-list','url'=>'/admin/finance/logs'],
        'finance.withdraw'=>['title'=>'提现管理','icon'=>'fa-exchange','url'=>'/admin/finance/withdraw']
    ]
];
$menus['marketing'] = [
    'title'=>'营销',
    'icon'=>'fa-gift',
    'url'=>'',
    'children'=>[
        'marketing.coupon'=>['title'=>'优惠券','icon'=>'fa-gg','url'=>'/admin/coupon']
    ]
];
$menus['statis'] = [
    'title'=>'数据',
    'icon'=>'fa-line-chart',
    'url'=>'',
    'children'=>[
        'statis.goods'=>['title'=>'商品统计','icon'=>'fa-gift','url'=>'/admin/statis/goods','children'=>[
            'statis.goods.details'=>['title'=>'销售明细','url'=>'/admin/statis/goods/details'],
            'statis.goods.rank'=>['title'=>'销量排行','url'=>'/admin/statis/goods/rank']
        ]],
        'statis.sales'=>['title'=>'销售统计','icon'=>'fa-bar-chart','url'=>'/admin/statis/sales','children'=>[
            'statis.sales.period'=>['title'=>'销售统计','url'=>'/admin/statis/sales/period'],
            'statis.sales.order'=>['title'=>'订单统计','url'=>'/admin/statis/sales/order']
        ]],
        'statis.member'=>['title'=>'会员统计','icon'=>'fa-users','url'=>'/admin/statis/member','children'=>[
            'statis.member.order'=>['title'=>'消费排行','url'=>'/admin/statis/member/order'],
            'statis.member.increase'=>['title'=>'增长趋势','url'=>'/admin/statis/member/increase']
        ]]
    ]
];
$menus['plugins'] = [
    'title'=>'应用',
    'icon'=>'fa-plugins',
    'url'=>'/admin/plugin'
];
return $menus;