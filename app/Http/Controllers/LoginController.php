<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
  public function index() {
    return view('login.index', [
      'active' => 'login',
      'title' => 'Login',
    ]);
  }

  public function login() {
    return view('login.index', [
      'active' => 'login',
      'title' => 'Login',
    ]);
  }
}
