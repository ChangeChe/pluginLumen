<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/3/30 0030
 * Time: 下午 5:48
 */

namespace Plugins\Promotion\Models;


use Illuminate\Database\Eloquent\Model;

class PromotionPrecord extends Model {
    protected $table = 'promotion_precord';
    protected $fillable = ['mid','proid','counts','lottery','guess','results','status'];
    protected $dateFormat = 'U';
}