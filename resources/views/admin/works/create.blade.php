@extends('layouts.admin')
@section('title', '新規作成')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">新規作成</h2>
    
    <div class="card p-4 shadow">
        <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">画像</label>
                    <input type="file" id="image" name="image" class="form-control" style="width: 95%;">
                </div>
           </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="title" class="form-label">タイトル入力</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="タイトルを入力" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">記事入力</label>
                    <textarea id="description" name="description" class="form-control" rows="8" placeholder="記事内容を入力" required></textarea>
                </div>
            </div>
            
            <div class="text-end mt-3">
                <button type="submit" class="btn btn=primary px-4">投稿</button>
            </div>
        </form>
    </div>
</div>
@endsection