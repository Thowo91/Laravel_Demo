<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Session;

class LanguageController extends Controller
{
    public function changeLanguage() {

        $language = Input::get('lang');
        Session::put('language',$language);
        Session::save();

        dump($language = Session::get('language'));

        return redirect()->back();
    }
}
