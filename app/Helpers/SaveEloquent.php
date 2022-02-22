<?php
namespace App\Helpers;

use App\Helpers\Contracts\SaveStr;
use Illuminate\Http\Request;
use App\Models\User;

class SaveEloquent implements SaveStr{

    public static function save(Request $request, User $user){
        $obj = new self;
        $date = $obj->checkData($request->only('description', 'text'));
        $user->posts()->create($date);
    }

    public function checkData($array){
        //тут проверка данных
        return $array;
    }
}
