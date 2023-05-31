<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
  public function index() {
    return view('login.index', [
      'active' => 'login',
      'title' => 'Login',
    ]);
  }

  public function login(Request $request) {
    $credentials = $request->validate([
      'username' => 'required|min:3|max:255',
      'password' => 'required|min:6|max:255',
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('dashboard');
    }

    $this->setAlert('danger', 'Login failed!');
    return back()->onlyInput('username')
      ->with('alert', $this->alert);
  }

  public function logout(Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }

  private function setAlert($color, $message) {
    $this->alert = compact('color', 'message');
  }
}
