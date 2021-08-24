<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => ['required'],
      'email' => [
        'required',
        'email',
        Rule::unique('users')->ignore($this->route()->parameter('user')->id)
      ],
      'password' => ['nullable', 'confirmed'],
    ];
  }

  public function attributes()
  {
    return [
      'name' => __('auth.name'),
      'email' => __('auth.email'),
      'password' => __('auth.password'),
    ];
  }

  public function messages()
  {
    return [
      'required' => __('auth.required'),
      'confirmed' => __('auth.confirmed'),
    ];
  }
}