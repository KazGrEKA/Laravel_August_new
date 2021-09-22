@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @include('inc.message')
                <h1 class="post-heading">Отзывы от наших пользователей</h1>
                @forelse ($feedbackList as $feedback)
                <!-- Post preview-->
                    <div class="post-preview">
                        <p class="post-subtitle">{!! $feedback->message !!}</p>
                        <p class="post-meta">
                            Опубликовал(а): 
                            {{ $feedback->name }}
                            от {{ $feedback->created_at->format('d-m-Y') }}
                        </p>
                    </div>
                <!-- Divider-->
                    <hr class="my-4" />
                @empty
                    <p class="post-meta">Отзывы отсутствуют, пишите!</p>
                @endforelse
                <div>
                    <a href="{{ route('feedback') }}" class="btn btn-primary">Написать отзыв</a>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection



