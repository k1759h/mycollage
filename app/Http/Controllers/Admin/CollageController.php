<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Works;

class CollageController extends Controller
{
    //
    public function index() //作品一覧
    {
        $works = Works::all();
        return view ('admin.works.index', ['works' => $works]);
    }
    
    public function create() //新規作成
    {
        return view('admin.works.create');
    }
    
    public function store(Request $request) //保存
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
         
        $work = new Works();
        $work->title = $validated['title'];
        $work->description = $validated['description'];
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('works', 'public')
            $work->image = $path;
        }
        
        $work->save();
         
            
        return redirect('/admin/works');
    }
    
    public function edit(Request $request, $id) //編集
    {
        $work = Works::findOrFail($id);
        
        return view('admin.works.edit', ['work' => $work]);
    }
    
    public function update(Request $request, $id) //更新
    {
        $varidated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'nullable|image|max: 2048',
        ]);
        
        $work = Works::findOrFail($id);
        $work->title = $validated['title'];
        $work->description = $validated['description'];
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('works', 'public')
            $work->image = $path;
        }
        
        $work->save();
        
           
        return redirect('/admin/works');
    }
    
    public function destroy($id) //削除
    {
        $work = Works::findOrFail($id);
        $work->delete();
        
        return redirect('/admin/works');
    }
}
