@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1 class="post-heading">Категории новостей:</h1>
                @forelse ($categoryList as $category)
                    <!-- Post preview-->
                        <div class="post-preview">
                            <a href="{{ route('categories.filter', ['id' => $category->id]) }}">
                                <h3 class="post-title" style="font-weight: normal; font-style: italic">{{ $category->title }}</h3>
                            </a>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @empty
                        <h2 class="post-title">Категории отсутствуют</h2>
                @endforelse
                <div class="d-flex justify-content-end mb-4">
                    {{ $categoryList->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection




