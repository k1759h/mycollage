<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Work;

class CollageController extends Controller
{
    public function index()
    {
        $works = Work::all()->sortByDesc('updated_at');
        
        if (count($works) > 0) {
            $headline = $works->shift();
        } else {
            $headline == null;
        }
        
        return view('works.index', ['headline' => $headline, 'works' => $works]);
    }
    //
}
