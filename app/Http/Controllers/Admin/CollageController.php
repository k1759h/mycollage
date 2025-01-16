<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;


class CollageController extends Controller
{
    //
    public function index() //作品一覧
    {
        $works = Work::all();
        
        $userId = Auth::id();
        
        $works = Work::where('user_id', $userId)->orderBy('updated_at', 'desc')->get();


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
        $work->user_id = auth()->id();
        
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
        
        if ($work->user_id !== auth()->id()) {
        abort(403, 'この作品を編集する権限がありません。');
        }
        
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
        
        if ($work->user_id !== auth()->id()) {
        abort(403, 'この作品を削除する権限がありません。');
        }

        
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
        
        if ($work->user_id !== auth()->id()) {
        abort(403, 'この作品を削除する権限がありません。');
        }

        
        $work->delete();
        
        return redirect('/admin/works');
    }
}
