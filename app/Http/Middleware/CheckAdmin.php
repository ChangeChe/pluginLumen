<?php
/**
 * Created by PhpStorm.
 * User: Change
 * Date: 2018/2/6 0006
 * Time: 下午 2:41
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Utils\ErrorCode;
use App\Services\AdminService;
class CheckAdmin{
    protected $expect = [
        'admin/login',
    ];
    protected $adminService;
    public function __construct(AdminService $adminService){
        $this->adminService = $adminService;
    }

    public function handle(Request $request, Closure $next){
        $url = $request->path();
        if(in_array($url,$this->expect)){
            return $next($request);
        }
        $token = $request->cookie('token','');
        $admin = empty($token)?null:$this->adminService->getByToken($token);
        if(empty($admin)&&$request->ajax()){
            $errArr = ErrorCode::$NOT_SIGNIN;
            return response()->json([
                'errorCode'  => $errArr[0],
                'errorStr'   => $errArr[1],
                'resultCount'=> 0,
                'results'    => null,
                'extraInfo'  => "0"
            ]);
        }elseif(empty($admin)){
            return "<script>top.location.href = '/admin/login'</script>";
        }
        $this->adminService->updateExpire($token);
        return $next($request);
    }
}