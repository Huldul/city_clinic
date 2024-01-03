<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function post_application(Request $request){
        Application::create([
            'name'=> $request->input('name'),
            'number'=> $request->input('number'),
            'text'=> $request->input('text'),
        ]);
        return redirect()->back()->with('success', 'Заявка успешно отправленна');
    }
}
