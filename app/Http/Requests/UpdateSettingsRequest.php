<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
      'user.username' => 'required|max:30|unique:users,username,' . auth()->id(),
      'user.name' => 'required|string',
      'user.profile_image' => 'nullable|image',
      'user.cover_image' => 'nullable|image',
      'user.city.' => 'nullable|string',
      'user.country' => 'nullable|string',
      'user.about_me' => 'nullable|string',
      'social.*' => 'nullable|url',
      'options.disable_comments' => 'boolean',
      'options.moderate_comments' => 'boolean',
      'options.email_notification.*' => 'nullable',
    ];
  }

  public function attributes()
  {
    return [
      'user.username' => 'Username',
      'user.name' => 'Name',
      'user.profile_image' => 'Profile image',
      'user.cover_image' => 'Cover image',
      'user.city.' => 'City',
      'user.country' => 'Country',
      'user.about_me' => 'About me',
      'social.facebook' => 'Facebook',
      'social.twitter' => 'Twitter',
      'social.instagram' => 'Instagram',
      'social.website' => 'Website',
    ];
  }

  public function getData()
  {
    $data = $this->validated();

    $directory = User::makeDirectory();
    $directory = $directory . '/user-' . auth()->id();

    if ($this->hasFile('user.profile_image')) {
      $data['user']['profile_image'] = $this->file('user.profile_image')->store($directory);
    }

    if ($this->hasFile('user.cover_image')) {
      $data['user']['cover_image'] = $this->file('user.cover_image')->store($directory);
    }

    return $data;
  }
}
