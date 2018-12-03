@include('includes.alert')

<div class="card mt-2">
    <div class="card-body">        
        @if (auth()->check())
        <form action="{{route('comment.store')}}" method="post">
            <div class="form-group">
                <label for="">Comment:</label>
                <textarea class="form-control" name="body" id="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Comment</button>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            @csrf
        </form>
        @else
            <p>You need <a href="{{route('login')}}">login</a> to comment!</p>
        @endif
        <hr>        
        @foreach ($comments as $item)
            <div class="mt-3">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <img src="https://via.placeholder.com/150"
                            class="rounded-circle" width="34rem"
                            height="34rem" alt="user img">
                    </li>
                    <li class="list-inline-item">
                        <small class="text-primary">
                            <b>{{$item->user->name}}</b>
                        </small>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-justify mr-auto">
                            <small>
                                {{$item->body}}
                            </small>
                        </p>
                    </li>
                </ul>                
                <small>{{$item->created_at}}</small>
                <hr>
            </div>
        @endforeach
        {{$comments->links()}}
    </div>
  </div>