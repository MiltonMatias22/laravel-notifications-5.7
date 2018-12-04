@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Posts</h4>
                @forelse ($posts as $item)
                    <ul class="list-inline d-flex mb-0">
                        <li class="list-inline-item mr-auto">
                            <h5>{{$item->title}} ({{$item->comments()->count()}})</h5>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('posts.show', $item->id)}}"><small>Details</small></a>
                        </li>
                    </ul>
                    <small>By: {{$item->user->name}}</small>
                    <hr>
                @empty
                    <p>No Posts!</p>
                @endforelse
                <div class="mt-4">
                    {{$posts->links()}}
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
