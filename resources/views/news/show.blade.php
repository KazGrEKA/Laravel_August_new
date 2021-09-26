@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">
                    <h4 class="post-subtitle" style="font-style: italic; font-weight: normal">
                        <a href="{{ route('categories.filter', ['id' => $news->category_id]) }}">
                            {{ optional($news->category)->title }}
                        </a>
                    </h4>
                    <h2 class="post-title">{{ $news->title }}</h2>
                    <p class="post-subtitle">{!! $news->description !!}</p>
                    <p class="post-meta">
                        Опубликовал
                        <a href="#!">Админ</a>
                        от {{ $news->created_at }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
