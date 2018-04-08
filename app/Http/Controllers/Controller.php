<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController{

    public function getSearch($request,$needs){
        $values = [];
        foreach ($needs as $key=>$def){
            $values[] = $request->input($key,$def);
        }
        return $values;
    }
}
