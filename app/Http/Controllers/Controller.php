<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
  use AuthorizesRequests, ValidatesRequests;

  /**
   * Alert data used for flash message.
   *
   * @var array<string, string> @alert
   */
  protected array $alert = [];

  /**
   * Set alert data.
   *
   * @param string $color   Flash message background color.
   * @param string $message Flash message text.
   */
  protected function setAlert($color, $message): void {
    $this->alert = compact('color', 'message');
  }
}
