<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    //
    public function index() //作品一覧
    {
        return view ('admin.works');
    }
    
    public function create() //新規作成
    {
        return view('admin.works.create');
    }
    
    public function store(Request $request) //保存
    {
        $varidated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            ]);
            
        return redirect('/admin/works');
    }
    
    public function edit($id) //編集
    {
        $work = Work::findOrFail($id);
        
        return view('admin.works.edit', ['work' => $work]);
    }
    
    public function update(Request $request, $id) //更新
    {
        $varidated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            ]);
            
        return redirect('/admin/works');
    }
    
    public function destroy($id) //削除
    {
        return redirect('/admin/works');
    }
}
