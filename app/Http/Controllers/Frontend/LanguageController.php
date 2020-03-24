<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Session;
use Spatie\TranslationLoader\LanguageLine;

class LanguageController extends Controller
{
    public function changeLanguage() {

//        LanguageLine::query()->updateOrCreate([
//            'group' => 'test',
//            'key' => 'greeting',
//            'text' => ['fr' => 'bonjour', 'de' => 'Servus', 'en' => 'Hello']
//        ]);

//        $line = LanguageLine::query()
//            ->where('key', 'greeting')
//            ->first();
//        dd($line);
//
//        $line->setTranslation('en', 'test');
//        $line->setTranslation('de', 'halali');
//        $line->save();


        $language = Input::get('lang');
        Session::put('language',$language);

        return redirect()->back();
    }
}
