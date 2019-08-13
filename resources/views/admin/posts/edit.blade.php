@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Modification d'un article</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Formulaire -->
                    <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST">
                        @method('PUT') <!-- Ajoute <input type=hidden value=PUT -->
                        @csrf <!-- Ajoute <input type=hidden value=XXXXX -->
                           <div class="row">
                               <div class="col-md-12 mb-3">
                                   <label for="title">Titre</label>
                                   <input value="{{ $post->title }}" type="text" class="form-control"
                                          id="title" placeholder="Titre">
                               </div>
                               <div class="col-md-12 mb-3">
                                   <label for="title">Contenu</label><br>
                                   <textarea name="content" id="content"
                                             style="width:100%" rows="5">{{ $post->content }}</textarea>
                               </div>
                               <div class="col-md-12 mb-3">
                                   <div class="row">
                                        <div class="col-md-6">
                                            <input type="submit" class="btn btn-block btn-primary" value="Modifier l'article">
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-block btn-danger"
                                                href="{{ route('posts.index') }}">
                                                Retourner à la liste
                                            </a>
                                       </div>
                                   </div>
                               </div>
                           </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
