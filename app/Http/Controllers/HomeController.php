<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function CreateTinyUrl(Request $request)
    {
//        $validatedData = $request->validate([
//            'url' => 'required|url',
//        ]);
        return response('hello');
    }
}
