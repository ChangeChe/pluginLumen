<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/3/30 0030
 * Time: 下午 8:23
 */

namespace Plugins\Promotion\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Utils\M3Result;
use App\Utils\ErrorCode;
use Illuminate\Http\Request;
use Plugins\Promotion\Services\PromotionService;
class PromotionController extends Controller {
    protected $promotionService;
    public function __construct(PromotionService $promotionService){
        $this->promotionService = $promotionService;
    }
    public function post(Request $request){
        $id = $request->input('id',0);
        if($request->isMethod('get')){
            $detail = $this->promotionService->detail($id);
            return view('promotion.views.promotion.post',compact('detail'));
        }
        $inputs = $request->all();
        $result = $this->promotionService->post($inputs,$id);
        if($result == -1){
            return M3Result::init(ErrorCode::$INFO_INSUFFICIENT);
        }
        return M3Result::init(ErrorCode::$OK);
    }
    public function delete(Request $request){
        $id = $request->input('id',0);
        $this->promotionService->delete($id);
        return M3Result::init(ErrorCode::$OK);
    }
    public function lists(Request $request,$status){
        $title = $request->input('title','');
        $list = $this->promotionService->lists($title,$status);
        return view('promotion.views.promotion.list',compact('list','request'));
    }
}