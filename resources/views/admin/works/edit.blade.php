@extends('layouts.admin')
@section('title', '作品を編集する')

@section('content')
<div class="container">
    <h1>作品の編集</h1>
    
    <form action="{{ route('works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $work->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">説明</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $work->description) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="image">画像</label>
            @if ($work->image_path)
               <div>
                   <p>現在の画像:</p>
                   <img src="{{ asset('storage/' . $work->image_path) }}" alt="画像" width="200">
               </div>
            @endif
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        
        <button type="submit" class="btn btn-success">更新する</button>
        
        <a href="{{ route('works.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection