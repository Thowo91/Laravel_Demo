<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        return view('backend.dashboard');
    }

    public function data() {

        $data = [15, 4, 10, 8, 2, 5];

        return $data;
    }
}
