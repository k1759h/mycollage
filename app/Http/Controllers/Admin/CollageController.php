<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class CollageController extends Controller
{
    //
    public function index() //作品一覧
    {
        $works = Work::all();
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
         
        $work = new Work();
        $work->title = $validated['title'];
        $work->description = $validated['description'];
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('works', 'public');
            $work->image_path = $path;
        }
        
        $work->save();
         
            
        return redirect('/admin/works');
    }
    
    public function edit($id) //編集
    {
        $work = Work::findOrFail($id);
        
        return view('admin.works.edit', ['work' => $work]);
    }
    
    public function update(Request $request, $id) //更新
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'nullable|image|max: 2048',
        ]);
        
        $work = Work::findOrFail($id);
        $work->title = $validated['title'];
        $work->description = $validated['description'];
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('works', 'public');
            $work->image_path = $path;
        }
        
        $work->save();
        
           
        return redirect('/admin/works');
    }
    
    public function destroy($id) //削除
    {
        $work = Work::findOrFail($id);
        $work->delete();
        
        return redirect('/admin/works');
    }
}
