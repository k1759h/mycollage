@extends('layouts.admin')
@section('title', 'あなたの作品一覧')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">作品一覧</h1>
    
    <div style="margin-bottom: 20px;">
        <a href="{{ route('works.create') }}" class="btn btn-primary">新規作成</a>
    </div>
    
    <div class="table-responsive">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>画像</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($works as $work)
            <tr>
                <a href="{{ route('works.edit', $work->id) }}">{{ $work->title }}</a>
            </td>
            
            <td>
                @if ($work->image)
                    <img src="{{ asset('storage/', $work->image_path) }}" alt="画像" style="width: 100px; height: auto;">
                @else
                    画像なし
                @endif
            </td>
            
                <form action="{{ route('works.destroy', $work->id) }}" method="POST" onsubmit="return confilm('本当に削除しますか？')";>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary">削除</button>
            </tr>
            @endforeach
        </tbody>
    </div>
</div>
@endsection