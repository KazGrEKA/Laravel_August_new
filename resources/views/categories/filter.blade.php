@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1 class="post-heading">Все новости из категории "{{ $category->title }}"</h1>
                @forelse ($category->news as $news)
                    <!-- Post preview-->
                        <div class="post-preview">
                            <a href="{{ route('news.show', ['news' => $news]) }}">
                                <h2 class="post-title">{{ $news->title }}</h2>
                                <h3 class="post-subtitle">{!! $news->description !!}</h3>
                            </a>
                            <p class="post-meta">
                                Опубликовал
                                <a href="#!">Админ</a>
                                от {{ $news->created_at }}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @empty
                        <p class="post-meta">Отсутствуют новости в выбранной категории</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

