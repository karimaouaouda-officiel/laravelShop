<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public static function index(){
        return view('messenger.messenger');
    }
}
