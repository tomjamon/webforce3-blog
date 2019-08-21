<!-- article.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    {{ $post->content }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bloc des commentaires -->
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des commentaires</div>
                <div class="card-body">
                    @foreach($post->comments as $comment)
                        <div class="media text-muted pt-3">
                            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="d-block text-gray-dark">
                                    <span style="color:#4256eb;">
                                        @ {{ $comment->user->name }}
                                    </span>
                                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                                </strong>
                                {{ $comment->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ajouter un commentaire</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
                        Vous devez être connecté pour ajouter un commentaire à cet article
                    @else
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="col-md-12 mb-3">
                                <label for="content">Contenu</label><br>
                                <textarea placeholder="Mon commentaire" name="content" style="width:100%" rows="5">{{ old('content') }}</textarea>
                            </div>
                            <br>
                            <input class="btn-block btn-primary btn" type="submit" value="Ajouter mon commentaire">
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
