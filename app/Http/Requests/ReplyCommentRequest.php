<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyCommentRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'body' => 'required|string|min:5'
    ];
  }

  public function getData(): array
  {
    $comment = $this->route('comment');

    return [
      'body' => '@' . $comment->user->username . ' ' . $this->body,
      'image_id' => $comment->image_id,
      'user_id' => $this->user()->id
    ];
  }
}
