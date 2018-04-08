<?php
/**
 * Created by PhpStorm.
 * User: Change 插件类库引入
 * Date: 2018/3/30 0030
 * Time: 下午 9:17
 */
$loader = new \Composer\Autoload\ClassLoader();
$loader->setPsr4('Plugins\\', base_path('plugins'));
$loader->register(true);