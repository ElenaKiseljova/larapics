<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  public function create(Comment $comment)
  {
    return view('comments.reply', compact('comment'));
  }

  public function store(ReplyCommentRequest $request, Comment $comment)
  {
    Comment::create(array_merge($request->getData(), ['approved' => true]));

    $comment->update(['approved' => true]);

    return to_route('comments.index')->with('message', 'You reply has been sent.');
  }
}
