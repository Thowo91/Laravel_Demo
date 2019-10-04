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

        $data = [5, 5, 5, 5, 5, 5];

        return $data;
    }
}
