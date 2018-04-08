<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/3/30 0030
 * Time: 下午 8:18
 */

namespace Plugins\Promotion\Services;


use App\Services\CommonService;
use Plugins\Promotion\Repos\PromotionRepos;
class PromotionService extends CommonService {
    protected $needs = ['low_gid'=>0,'high_gid'=>0,'low_price'=>0,'high_price'=>0,'stock'=>0,'displayorder'=>0];
    protected $must = ['low_gid','high_gid'];
    protected $promotionRepos;
    public function __construct(PromotionRepos $promotionRepos){
        $this->promotionRepos = $promotionRepos;
    }
    public function post($inputs,$id){
        $data = $this->getData($inputs);
        if(empty($data)) return -1;
        if($id){
            $this->promotionRepos->update($id,$data);
        }else{
            $this->promotionRepos->add($data);
        }
        return 0;
    }
    public function detail($id){
        return $this->promotionRepos->detail($id);
    }
    public function delete($ids){
        $ids = is_array($ids)?$ids:[$ids];
        return $this->promotionRepos->delete($ids);
    }
    public function lists($title,$status){
        $list = $this->promotionRepos->lists($title,$status);
        return $list->appends(compact('title'));
    }
    public function frontList(){
        return $this->promotionRepos->frontList();
    }
}