<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
      // 1
      // 'account.email' => 'required|email|unique:users,email,' . auth()->id(),
      // 2
      'account.email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
      'account.password' => [
        Rule::requiredIf(
          $this->account['email'] !== auth()->user()->email || !empty($this->account['new_password']),
        ),
        function ($attribute, $value, $fail) {
          if (!empty($value) && !Hash::check($value, auth()->user()->password)) {
            $fail('The Password is incorrect');
          }
        }
      ],
      'account.new_password' => 'nullable|confirmed|min:8',
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
      'account.email' => 'Email',
      'account.password' => 'Current password',
      'account.new_password' => 'New password',
      'social.facebook' => 'Facebook',
      'social.twitter' => 'Twitter',
      'social.instagram' => 'Instagram',
      'social.website' => 'Website',
    ];
  }

  public function getData()
  {
    $data = $this->validated();

    // Files
    $directory = User::makeDirectory();
    $directory = $directory . '/user-' . auth()->id();

    // Profile image
    if ($this->hasFile('user.profile_image')) {
      $data['user']['profile_image'] = $this->file('user.profile_image')->store($directory);
    }

    // Cover image
    if ($this->hasFile('user.cover_image')) {
      $data['user']['cover_image'] = $this->file('user.cover_image')->store($directory);
    }

    // Email
    if (!empty($data['account']['password'])) {
      $data['user']['email'] = $data['account']['email'];
    }

    // New password
    if (!empty($data['account']['new_password'])) {
      $data['user']['password'] = Hash::make($data['account']['new_password']);
    }

    unset($data['account']);

    return $data;
  }
}
