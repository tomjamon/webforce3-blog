@extends('layouts.app')

@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Bienvenue sur mon blog</h1>
                <p class="lead text-muted">
                    Ceci est mon blog personnel de développeur. J'écris des articles à propos de l'informatique qui me passionne !</p>
                <p>
                    <a href="{{ route('login') }}" class="btn btn-primary my-2">S'inscrire</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary my-2">Se connecter</a>
                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach($posts as $post)
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
            </div>
        </div>

    </main>











@endsection
