@extends('layouts.admin')
@section('title', 'あなたの作品一覧')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">作品一覧（編集はタイトルをクリック）</h1>
    
    <div style="margin-bottom: 20px;">
        <a href="{{ route('works.create') }}" class="btn btn-primary">新規作成</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>画像</th>
                    <th class="text-end">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                <tr>
                    <td>
                        <a href="{{ route('works.edit', $work->id) }}">{{ $work->title }}</a>
                    </td>
                    
                    <td>
                        @if ($work->image_path)
                            <img src="{{ asset('storage/' . $work->image_path) }}" alt="画像" width="200">
                        @else
                            画像なし
                        @endif
                    </td>
                    
                    <td class="text-end">
                        <form action="{{ route('works.destroy', $work->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
