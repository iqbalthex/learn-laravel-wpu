<?php

use App\Http\Controllers\Auth\ {
  AuthenticatedSessionController,
  ConfirmablePasswordController,
  EmailVerificationNotificationController,
  EmailVerificationPromptController,
  PasswordController,
  VerifyEmailController,
};
use Illuminate\Support\Facades\Route;

Route::get('/verify-email', EmailVerificationPromptController::class)->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
