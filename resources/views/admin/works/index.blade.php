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
            <td>
                <a href="{{ route('works.edit', $work->id) }}">{{ $work->title }}</a>
            </td>
        </tbody>
    </div>
</div>