<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/2/5 0005
 * Time: 下午 9:35
 */
$perms['perm'] = [
    'title'=>'权限管理',
    'children'=>[
        'perm.role'=>[
        'title'=>'角色管理',
        'children'=>['perm.role.add'=>'添加','perm.role.update'=>'更新','perm.role.delete'=>'删除',]
    ],
        'perm.admin'=>[
            'title'=>'用户管理',
            'children'=>['perm.admin.add'=>'添加','perm.admin.update'=>'更新','perm.admin.delete'=>'删除',]
        ],
    ]
];
//the permission of system settings module
$perms['sysset'] = [
    'title'=>'设置',
    'children'=>['sysset.params'=>[
        'title'=>'参数设置',
        'children'=>['sysset.params.post'=>'设置']
        ],
        'sysset.poster'=>[
            'title'=>'海报设计',
            'children'=>['sysset.poster.goods'=>'商品海报','sysset.poster.member'=>'会员海报']
        ]
    ]
];
$perms['shop'] = [
    'title'=>'商城',
    'children'=>[
        'shop.activity'=>[
            'title'=>'首页活动区',
            'children'=>['shop.activity.save'=>'保存']
        ],
        'shop.recommand'=>[
            'title'=>'首页推荐',
            'children'=>['shop.recommand.save'=>'保存']
        ],
        'shop.banner'=>[
        'title'=>'轮播图',
        'children'=>['shop.banner.add'=>'添加','shop.banner.update'=>'更新','shop.banner.delete'=>'删除']
        ],
        'shop.category'=>[
            'title'=>'商品分类',
            'children'=>['shop.category.add'=>'添加','shop.category.update'=>'更新','shop.category.delete'=>'删除']
        ],
        'shop.goods'=>[
            'title'=>'商品管理',
            'children'=>['shop.goods.add'=>'添加','shop.goods.import'=>'导入','shop.goods.update'=>'更新','shop.goods.delete'=>'删除']
        ],
        'shop.express'=>[
            'title'=>'运费模板',
            'children'=>['shop.express.add'=>'添加','shop.express.update'=>'更新','shop.express.delete'=>'删除']
        ],
        'shop.comment'=>[
            'title'=>'评论管理',
            'children'=>['shop.comment.reply'=>'回复','shop.comment.delete'=>'删除']
        ]
    ]
];

$perms['member'] = [
    'title'=>'会员',
    'children'=>[
        'member.level'=>[
            'title'=>'会员等级',
            'children'=>['member.level.add'=>'添加','member.level.update'=>'更新','member.level.delete'=>'删除']
        ],
        'member.note'=>[
            'title'=>'等级说明',
            'children'=>['member.note.update'=>'更新']
        ],
        'member.member'=>[
            'title'=>'会员列表',
            'children'=>['member.member.update'=>'更新','member.member.black'=>'拉黑/除黑','member.member.logs'=>'佣金流水'],
        ],

    ]
];
$perms['order'] = [
    'title'=>'订单',
    'children'=>[
        'order.order'=>[
            'title'=>'订单管理',
            'children'=>['order.order.pay'=>'后台付款','order.order.send'=>'发货','order.order.finish'=>'收货','order.order.cancel'=>'取消订单','order.order.delete'=>'删除订单']
        ],
        'order.refund'=>[
            'title'=>'维权',
            'children'=>['order.refund.handle'=>'处理']
        ]
    ]
];
$perms['finance'] = [
    'title'=>'佣金',
    'children'=>[
        'finance.logs'=>[
            'title'=>'佣金流水',
            'chilren'=>[]
        ],
        'finance.withdraw'=>[
            'title'=>'提现管理',
            'children'=>['finance.withdraw.verify'=>'审核']
        ]
    ]
];
$perms['marketing'] = [
    'title'=>'营销',
    'children'=>[
        'marketing.coupon'=>[
            'title'=>'优惠券',
            'children'=>['marketing.coupon.add'=>'添加','marketing.coupon.update'=>'更新','marketing.coupon.delete'=>'删除']
        ]
    ]
];
$perms['statis'] = [
    'title'=>'数据',
    'children'=>[
        'statis.goods'=>[
            'title'=>'商品统计',
            'children'=>['statis.goods.details'=>'销售明细','statis.goods.rank'=>'销售排行']
        ],
        'statis.sales'=>[
            'title'=>'销售统计',
            'children'=>['statis.sales.period'=>'销售统计','statis.sales.order'=>'订单统计']
        ],
        'statis.member'=>[
            'title'=>'会员统计',
            'children'=>['statis.member.order'=>'消费排行','statis.member.increase'=>'增长趋势']
        ]
    ]
];
$perms['plugins'] = [
    'title'=>'应用',
    'children'=>[
        'plugins.supplier'=>[
            'title'=>'供应商',
            'children'=>['plugins.supplier.add'=>'添加','plugins.supplier.update'=>'更新','plugins.supplier.delete'=>'删除']
        ]
    ]
];
return $perms;