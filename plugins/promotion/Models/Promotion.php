<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/3/30 0030
 * Time: 下午 5:45
 */

namespace Plugins\Promotion\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Promotion extends Model {
    use SoftDeletes;
    protected $table = 'promotion';
    protected $fillable = ['low_gid','low_price','high_gid','high_price','stock','displayorder','status'];
    protected $dateFormat = 'U';
    public function lowGoods(){
        return $this->hasOne('App\Models\Goods','id','low_gid');
    }
    public function highGoods(){
        return $this->hasOne('App\Models\Goods','id','high_gid');
    }
}