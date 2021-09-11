@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1 class="post-heading">Все новости из категории "{{ $categoriesList[$id] }}"</h1>
            @forelse ($newsList as $news)
                <!-- Post preview-->
                    @if ($news['category_id'] == $id)
                        <div class="post-preview">
                            <a href="{{ route('news.show', ['id' => $loop->iteration]) }}">
                                <h2 class="post-title">{{ $news['title'] }}</h2>
                                <h3 class="post-subtitle">{!! $news['description'] !!}</h3>
                            </a>
                            <p class="post-meta">
                                Опубликовал
                                <a href="#!">Админ</a>
                                от {{ now()->format('d-m-Y H:i') }}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @endif
                @empty
                    <h2 class="post-title">Отсутствуют новости в выбранной категории</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
