<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultieController extends Controller
{
    public function index()
    {
        return view('pages.facultie.index');
    }
}