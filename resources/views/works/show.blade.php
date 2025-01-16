@extends('layouts.front')

@section('title', $work->title)

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">{{ $work->title }}</h1>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <img src="{{ asset('storage/' . $work->image_path) }}" alt="{{ $work->title }}" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">{!! nl2br(e($work->description)) !!}</p>
                    <a href="{{ route('works.index') }}" class="btn btn-primary">作品一覧に戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection