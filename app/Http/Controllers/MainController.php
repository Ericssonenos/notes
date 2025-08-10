<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        echo "MainController@index";
    }
    public function newNote(){
        echo "MainController@newNote";
    }
}
