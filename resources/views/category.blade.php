<!-- category.blade.php -->
@extends('layouts.app')

@section('content')

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <h1>Vous êtes sur la catégorie : {{ $title_category }}</h1>
                {{ $posts->links() }}
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#4ea7ea"></rect><text x="45%" y="50%" fill="#eceeef" dy=".3em">Article</text></svg>
                                <div class="card-body">
                                    <h4>
                                        {{ $post->title }}
                                    </h4>
                                    <p class="card-text">
                                        @if ($post->category)
                                            <span class="badge badge-secondary">{{ $post->category->title }}</span>
                                        @endif
                                        <br>
                                        {{ $post->content }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('article', ['id' => $post->id]) }}"  class="btn btn-sm btn-outline-info">Voir</a>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                        </div>
                                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $posts->links() }}
            </div>
        </div>

    </main>











@endsection
