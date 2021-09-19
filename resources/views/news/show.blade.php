@extends('layouts.main')
@section('content')
<!-- Featured blog post-->
<div class="col-lg-8">
<div class="card mb-4">
    <a href="#!">
        <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." />
    </a>
    <div class="card-body">
    	@forelse($newsList as $news)
        <div class="small text-muted">{{ $id }}</div>
        <h2 class="card-title">{{ $news->title}}</h2>
        <p>{{ $news->author}}</p>
        <p class="card-text">{{ $news->description}}</p>
        @empty
        	<h2>Запись потеряшка</h2>
        @endforelse
        @if($request['title'] != "" )
        	<h3>FeadBack:<h3>
            <p>Name: {{ $request['title'] }}</p>
            <p>E-mail: {{ $request['author'] }}</p>
            <p>Text: {{ $request['description'] }}</p>
            @else
                    <h2>Отзыва нет</h2>
            @endif
        <form method="post" action="{{ route('news.show', ['id' => $id, 'idCategory' => $idCategory]) }}">
                @csrf
                <div class="form-group">
                    <label for="title">Ваше имя:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="author">Email:</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
                </div>

                <div class="form-group">
                    <label for="description">Отзыв:</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
            
        <!--<a class="btn btn-primary" href="#!">Read more →</a>-->
    </div>
</div>
</div>
@endsection
@push('js')
    <script>
        //alert("Hello!");
    </script>
@endpush
