<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/30 0030
 * Time: 下午 8:28
 */
$router->group(['middleware' => ['admin.login'],'namespace'=>'Admin','prefix' => 'promotion'], function () use ($router) {
    $router->get('list',function(){
        return redirect('/promotion/list/1');
    });
    $router->get('list/{status}','PromotionController@lists');
});