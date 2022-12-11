<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function messenger(){
        return view('messenger.messenger');
    }


    public function fire(Request $req){
        $id = $req->input('id');
        $user = User::all()->where('id' , '='  , $id);

        event(new MessageEvent($user));

        return 'fired';
    }
}
