<?php

namespace App\Providers;

use App\Models\ {
  Post,
  User,
};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\ {
  Blade,
  Gate,
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  // public function register(): void {
    //
  // }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void {
    Blade::anonymousComponentPath(resource_path('views/anonymous-components'));
    Paginator::useBootstrap();

    Gate::define('admin', fn (User $user) => $user->is_admin);
  }
}
