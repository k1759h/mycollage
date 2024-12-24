@extends('layouts.front')
@section('title', '作品一覧')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">作品一覧</h1>
    
    <div class="row">
        @foreach ($works as $work)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="row g-0">
                    <!--作品画像 -->
                    <div class="col-4">
                        @if ($work->image_path)
                        <img src="{{ asset('storage/' . $work->image_path) }}" alt="{{ $work->title }}" class="img-fluid rouded-start">
                        @else
                        <img src="https://via.placeholder.com/150" alt="No Image" class="img-fluid rounded-start">
                        @endif
                    </div>
                    
                    <!-- タイトルと内容 -->
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $work->title }}</h5>
                            <p class="card-text" style="font-size: 14px; line-height: 1.6;">
                                {{ Str::limit($work->description, 100) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection