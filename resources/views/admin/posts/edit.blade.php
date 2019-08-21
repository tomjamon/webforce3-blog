@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Modification d'un article</div>
                    <div class="card-body">

                        <!-- Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulaire -->
                        <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST">
                            @method('PUT') <!-- Ajoute <input type=hidden value=PUT -->
                            @csrf <!-- Ajoute <input type=hidden value=XXXXX -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="title">Titre</label>
                                    <input value="@if(old('title')) {{old('title')}} @else {{ $post->title }} @endif" placeholder="Titre"
                                            name="title" type="text" class="form-control" id="title">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="content">Contenu</label><br>
                                    <textarea placeholder="Contenu" name="content" id="content" style="width:100%" rows="5">@if(old('content')) {{old('content')}} @else {{ $post->content }} @endif</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="draft">Brouillon</label>
                                    <div class="form-check">
                                        <input @if(old('draft')||($post->draft)) checked="checked" @endif name="draft" id="draft" class="form-check-input" type="checkbox">
                                        <label class="form-check-label" for="draft">
                                            Est un brouillon
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="active">Actif</label>
                                    <div class="form-check">
                                        <input @if(old('active')||($post->active)) checked="checked" @endif name="active" id="active" class="form-check-input" type="checkbox">
                                        <label class="form-check-label" for="active">
                                            Visible sur la plateforme
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="theme">Thème</label>
                                    <select class="custom-select" name="theme">
                                        <option @if($post->theme == 'Symfony') selected @endif value="Symfony">Symfony</option>
                                        <option @if($post->theme == 'Laravel') selected @endif value="Laravel">Laravel</option>
                                        <option @if($post->theme == 'Wordpress') selected @endif value="Wordpress">Wordpress</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="category_id">Catégorie</label>
                                    <select class="custom-select" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col-md-12 mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="submit" class="btn btn-block btn-primary"
                                                   value="Modifier l'article">
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
