@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Création d'un article</div>
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
                    <form action="{{ route('pages.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="title">Titre</label>
                            <input value="{{ old('title') }}" placeholder="Titre" name="title" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="slug">Slug</label>
                            <input value="{{ old('slug') }}" placeholder="Slug" name="slug" type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="content">Contenu</label><br>
                            <textarea placeholder="Contenu" name="content" id="content" style="width:100%" rows="5">
                                {{ old('content') }}
                            </textarea>
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
                        <br>
                        <input class="btn-block btn-primary btn" type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
