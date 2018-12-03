@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-10 col-lg-10 mb-4">
            <div class="card mb-2">
                <img class="card-img-top" height="250"
                    src="https://via.placeholder.com/150"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">
                        {{$post->body}}
                    </p>
                    <p>
                        <small>
                            Author: {{$post->user->name}}
                        </small>
                    </p>
                    <p><small>{{$post->created_at}}</small></p>
                </div>
            </div>
            @include('posts.comments.comment')
        </div>
    </div>
</div>
@endsection
