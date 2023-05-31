<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\{
  Http\RedirectResponse,
  Http\Request,
  View\View
};

class RegisterController extends Controller {
  /**
   * @var array<string, string> @alert
   */
  private array $alert;

  public function index(): View {
    return view('register.index', [
      'active' => 'register',
      'title' => 'Register',
    ]);
  }

  /**
   * @param  Illuminate\Http\Request $request
   */
  public function store(UserRequest $request): RedirectResponse {
    $data = $request->validated();

    // User::create($data)

    if (true) {
      return back();//->withErrors('errors', ['name' => 'tes']);
    }

    $this->setAlert('success', 'Registration success!');

    return to_route('login')->with('alert', $this->alert);
  }

  private function setAlert($color, $message): void {
    $this->alert = compact('color', 'message');
  }
}
