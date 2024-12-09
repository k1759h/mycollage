<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    //
    public function index()
    {
        $works = ['Sample Work 1', 'Sample Work 2'];
        return view('admin.works.index', ['works' => $works]);
    }
    
    public function create()
    {
        return view('admin.works.create');
    }
    
    public function store(Request $request)
    {
        $varidated = $request->varidate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            ]);
            
        return redirect('/admin/works');
    }
    
    public function edit($id)
    {
        $work = null;
        return view('admin.works.edit', ['work' => $work]);
    }
    
    public function update(Request $request, $id)
    {
        $varidated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            ]);
            
        return redirect('/admin/works');
    }
    
    public function destroy($id)
    {
        return redirect('/admin/works');
    }
}
