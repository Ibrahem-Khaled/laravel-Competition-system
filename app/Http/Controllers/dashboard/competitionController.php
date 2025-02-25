<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class competitionController extends Controller
{
    public function index()
    {
        return view('dashboard.competition');
    }
}
