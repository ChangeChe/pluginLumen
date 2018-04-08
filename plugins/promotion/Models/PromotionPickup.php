<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/3/30 0030
 * Time: 下午 7:00
 */

namespace Plugins\Promotion\Models;


use Illuminate\Database\Eloquent\Model;

class PromotionPickup extends Model {
    protected $table = 'promotion_pickup';
    protected $fillable = ['mid','preid','gid','status','expresscom','expressno','areaid','address','mobile','receiver'];
    protected $dateFormat = 'U';
}