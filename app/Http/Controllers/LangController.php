<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    private $langActive = [
        'vi',
        'en',
    ];

    /**
     * @param Request $request
     * @param $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLang(Request $request, $lang): \Illuminate\Http\RedirectResponse
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);
            return redirect()->back();
        }
    }
}
