@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('article', ['id' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
