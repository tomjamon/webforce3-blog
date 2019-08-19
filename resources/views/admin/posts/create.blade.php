@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Création d'un article</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="title">Titre</label>
                            <input value="{{ old('title') }}" placeholder="Titre" name="title" type="text" class="form-control" id="title">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="content">Contenu</label><br>
                            <textarea value="{{ old('content') }}"  placeholder="Contenu" name="content" id="content" style="width:100%" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="draft">Brouillon</label>
                            <div class="form-check">
                                <input name="draft" id="draft" class="form-check-input" type="checkbox">
                                <label class="form-check-label" for="draft">
                                    Est un brouillon
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="active">Actif</label>
                            <div class="form-check">
                                <input name="active" id="active" class="form-check-input" type="checkbox">
                                <label class="form-check-label" for="active">
                                    Visible sur la plateforme
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="theme">Thème</label>
                            <select class="custom-select" name="theme">
                                <option value="Symfony">Symfony</option>
                                <option value="Laravel">Laravel</option>
                                <option value="Wordpress">Wordpress</option>
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
                        <input class="btn-block btn-primary btn" type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
