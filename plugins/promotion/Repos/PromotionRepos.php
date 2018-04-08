<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/3/30 0030
 * Time: 下午 7:36
 */

namespace Plugins\Promotion\Repos;

use Plugins\Promotion\Models\Promotion;
class PromotionRepos{
    public function add($data){
        return Promotion::create($data);
    }
    public function update($id,$data){
        return Promotion::where('id',$id)->update($data);
    }
    public function lists($title,$status){
        $query = Promotion::with(['low_goods','high_goods']);
        if(!empty($title)){
            $query->where(function($query)use($title){
                $query->whereHas('low_goods',function($query)use($title){
                    $query->where('title','like','%'.$title.'%');
                })->orWhereHas('high_goods',function($query)use($title){
                    $query->where('title','like','%'.$title.'%');
                });
            });

        }
        if(is_numeric($status)){
            switch ($status){
                case 1:
                    $query->where('stock','>',0);
                    break;
                case 2:
                    $query->where('stock',0);
                    break;
            }
        }
        return $query->orderBy('displayorder','asc')->paginate();
    }
    public function delete($ids){
        return Promotion::whereIn('id',$ids)->delete();
    }
    public function detail($id){
        return Promotion::find($id);
    }
    #前台列表
    public function frontList(){
        $query = Promotion::with(['low_goods'=>function($query){
            $query->select(['photos','title','id']);
        },'high_goods'=>function($query){
            $query->select(['photos','title','id']);
        }])->where('stock','>',0);

        return $query->select(['id','low_gid','high_gid','low_price','high_price','stock'])->orderBy('displayorder','asc')->paginate();
    }
}