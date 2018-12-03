@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Posts</h4>
                @forelse ($posts as $item)
                    <ul class="list-inline d-flex">
                        <li class="list-inline-item mr-auto">
                            <h4>{{$item->title}}</h4>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('posts.show', $item->id)}}"><small>Details</small></a>
                        </li>
                    </ul>
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
