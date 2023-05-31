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
   * Alert data used for flash message.
   *
   * @var array<string, string> @alert
   */
  private array $alert;

  /**
   * Show registration form page.
   */
  public function index(): View {
    return view('register.index', [
      'active' => 'register',
      'title' => 'Register',
    ]);
  }

  /**
   * Register user data to database.
   *
   * @param  Illuminate\Http\Request $request
   */
  public function store(UserRequest $request): RedirectResponse {
    // Get validated data.
    $data = $request->validated();

    // Store the data, back to registration form when failed.
    if (!User::create($data)) {
      $this->setAlert('danger', 'Registration failed!');
      return back()->with('alert', $this->alert);
    }

    $this->setAlert('success', 'Registration success!');

    // Redirect to login form page when success.
    return to_route('login')->with('alert', $this->alert);
  }

  /**
   * Set alert data.
   *
   * @param string $color   Flash message background color.
   * @param string $message Flash message content.
   */
  private function setAlert($color, $message): void {
    $this->alert = compact('color', 'message');
  }
}
