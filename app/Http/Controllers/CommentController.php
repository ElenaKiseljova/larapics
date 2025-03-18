<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $comments = Comment::forUser(auth()->user())
      ->with(['user', 'image'])
      ->latest()
      ->paginate(10);

    return view('comments.index', compact('comments'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Image $image, CreateCommentRequest $request)
  {
    $moderateComments = $this->moderateComments($image);

    extract($moderateComments);

    $image->comments()->create($request->getData() + $approvement);

    return back()->with('message', $message);
  }

  public function moderateComments(Image $image)
  {
    if ($image->user_id !== auth()->user()->id && $image->user->setting->moderate_comments) {
      $message = 'Your comment is awaiting moderation. It will be visible after it has been approved.';
      $approvement = ['approved' => false];
    } else {
      $message = 'Your comment has been sent';
      $approvement = ['approved' => true];
    }


    return compact('approvement', 'message');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Comment $comment)
  {
    $comment->approved = $request->approved == 1;

    $comment->update();

    return back()
      ->with('updated', $comment->id)
      ->with('message', 'Comment has been ' . ($comment->approved ? 'approved' : 'unapproved'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Comment $comment)
  {
    $comment->delete();

    return back()->with('message', 'Comment has been removed.');
  }
}
