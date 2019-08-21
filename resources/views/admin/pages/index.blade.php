@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('pages.create') }}">
                Créer une nouvelle page
            </a>
            <hr>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Titre de la page</th>
                        <th>Date de création</th>
                        <th>Date de modification</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->created_at->diffForHumans() }}</td>
                        <td>{{ $page->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="d-inline-block btn btn-sm btn-primary"
                                href="{{ route('pages.edit', ['id' => $page->id]) }}">
                                Modifier
                            </a>
                            <form class="d-inline-block" action="{{ route('pages.destroy', ['id' => $page->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <hr>
            {{ $pages->links() }}
        </div>
    </div>
</div>
@endsection
