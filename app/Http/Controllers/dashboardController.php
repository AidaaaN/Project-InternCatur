<?php

namespace App\Http\Controllers;

use App\Models\dashboardModel;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    protected $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel  = new dashboardModel();
    }

    public function index()
    {
        return view('dashboard');
    }
}
