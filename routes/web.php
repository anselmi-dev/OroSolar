<?php

use App\Livewire\About;
use App\Livewire\Blog;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Page;
use App\Livewire\Projects;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Livewire\PrivacyPolicy;
use App\Livewire\TermsOfService;
use App\Livewire\Faqs;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/projects', Projects::class)->name('projects');
Route::get('/page', Page::class)->name('page');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
Route::get('/terms-of-service', TermsOfService::class)->name('terms-of-service');
Route::get('/faqs', Faqs::class)->name('faqs');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
