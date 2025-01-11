<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Work;

class CollageController extends Controller
{
    public function top()
    {
        return view('/');
    }
    
    
    public function index()
    {
        $works = Work::orderBy('updated_at', 'desc')->get();
        
        $headline = $works->first();
        
        $works = $works->slice(1);
        
        return view('works.index', ['headline' => $headline, 'works' => $works]);
    }
    
    
    
    public function show($id)
    {
        $work = Work::findOrFail($id);
        return view('works.show', ['work' => $work]);
    }
}
