<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigHeaterController extends Controller
{
    public function index()
    {
        return view('content.config.heater.index');
    }
}
