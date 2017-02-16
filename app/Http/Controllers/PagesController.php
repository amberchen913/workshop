<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about(){
        $people = [
            'Aaa', 'Bbb', 'Ccc'
        ];
        return view('pages.about', compact('people'));
    }

    public function contact(){
        $first = 'Amber'; 
        $last = 'Chen';
        return view('pages.contact', compact('first', 'last'));
    }
}
