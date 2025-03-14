<?php

namespace App\Http\Requests;

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
      'social.*' => 'nullable|url'
    ];
  }

  public function attributes()
  {
    return [
      'social.facebook' => 'Facebook',
      'social.twitter' => 'Twitter',
      'social.instagram' => 'Instagram',
      'social.website' => 'Website',
    ];
  }

  public function getData()
  {
    return $this->validated();
  }
}
