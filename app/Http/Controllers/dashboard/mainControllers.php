<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;

class mainControllers extends Controller
{
    public function index()
    {
        $vestorsCont = View::get()->count();
        $UsersWinnerCont = User::whereHas('competitions')->get()->count();
        $supportersCont = User::where('role', 'supporter')->get()->count();
        $allUsers = User::where('role', 'user')->get()->count();
        return view('dashboard.index', compact('vestorsCont', 'UsersWinnerCont', 'supportersCont', 'allUsers'));
    }
}
