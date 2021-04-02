<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    private $langActive = [
        'vi',
        'en',
    ];

    public function changeLang(Request $request, $lang)
    {
        //receive change language request, and save to session
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);

            return redirect()->back();
        }
    }
}
