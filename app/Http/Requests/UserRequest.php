<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array {
    return [
      'name' => 'required|max:255',
      'email' => 'required|email:dns|unique:users',
      'username' => 'required|min:3|max:255',
      'password' => 'required|min:6|max:255',
    ];
  }
}
