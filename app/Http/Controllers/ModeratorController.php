<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index(){
    	view('tickets.subviews.moderator.home');
    }
}
