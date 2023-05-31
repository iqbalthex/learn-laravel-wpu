<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component {
  /**
   * Create a new component instance.
   */
  public function __construct(
    public $name = '',
    public $type = '',
    public $label = '',
  ) {}

  public function isInvalid() {
    $error = session('errors')?->messages();
    if (is_null($error)) return;

    $this->message = $error[$this->name][0] ?? null;
    if (is_null($this->message)) return;

    return 'is-invalid';
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string {
    return view('components.form.input');
  }
}
