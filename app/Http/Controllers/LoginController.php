<?php

namespace App\Http\Controllers;

// use App\Http\Requests\UserRequest;
use Illuminate\Http\{
  RedirectResponse,
  Request,
};
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
  public function index() {;
    return view('login.index', [
      'active' => 'login',
      'title' => 'Login',
    ]);
  }

  /**
   * @param Illuminate\Http\Request $request
   */
  public function login(Request $request) {
    // $credentials = $request->validated(['username', 'password']);
    $credentials = $request->validate([
      'username' => 'required|min:3|max:255',
      'password' => 'required|min:6|max:255',
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      $this->setAlert('success', 'Login success!');
      return redirect('/dashboard')->with('alert', $this->alert);
    }

    $this->setAlert('danger', 'Login failed!');
    return back()->onlyInput('username')
      ->with('alert', $this->alert);
  }

  /**
   * @param Illuminate\Http\Request $request
   */
  public function logout(Request $request): RedirectResponse {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    $this->setAlert('success', 'You\'ve been logged out!');
    return to_route('login')->with('alert', $this->alert);
  }

  private function setAlert($color, $message) {
    $this->alert = compact('color', 'message');
  }
}
