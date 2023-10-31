<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bbs;

class BbsController extends Controller
{
    public function index()
    {
        $context = ['Bbs' => Bbs::latest()->get()];

        return view('index', $context);
    }

    public function itemDetails($id)
    {   
        $context = ['Bbs' => Bbs::find($id)];

        return view('itemDetails', $context);
    }
}
