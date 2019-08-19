@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('posts.create') }}">
                Créer un nouvel article
            </a>
            <hr>
            {{ $posts->links() }}
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>TITRE</th>
                        <th>Date de création</th>
                        <th>Date de modification</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('posts.edit', ['id'=>$post->id]) }}">
                                Modifier
                            </a>
                            <a class="btn btn-sm btn-danger"
                               href="{{ route('posts.destroy', ['id'=>$post->id]) }}">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
