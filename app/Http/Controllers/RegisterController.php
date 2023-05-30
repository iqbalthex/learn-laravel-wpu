<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller {
  /**
   * @var array<string, string> @alert
   */
  private array $alert;

  /**
   * @return Illuminate\View\View
   */
  public function index(): View {
    return view('register.index', [
      'active' => 'register',
      'title' => 'Register',
    ]);
  }

  /**
   * @param  Illuminate\Http\Request $request
   *
   * @return Illuminate\Http\RedirectResponse
   */
  public function store(Request $request): RedirectResponse {
    $validatedData = $request->validate([
      'name'     => 'required|max:255',
      'username' => 'required|min:3|max:255',
      'email'    => 'required|email:dns|unique:users',
      'password' => 'required|min:6|max:255',
    ]);

    User::create($validatedData);

    $this->setAlert('success', 'Registration success!');

    return to_route('login')->with('alert', $this->alert);
  }

  private function setAlert($color, $message): void {
    $this->alert = compact('color', 'message');
  }
}
