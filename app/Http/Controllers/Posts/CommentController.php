<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Notifications\PostComment;
class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {

        $comment = auth()->user()
                            ->comments()
                            ->create($request->all());
        // get post author
        $author = $comment->post->user;
        $author->notify(new PostComment($comment));

        if ($comment->wasRecentlyCreated) {
            //messages session
            \Session::flash('success',[
                'success' => true,
                'message' => 'Commented successful!'
            ]); 
        }

        return redirect()->back();
    }
}
