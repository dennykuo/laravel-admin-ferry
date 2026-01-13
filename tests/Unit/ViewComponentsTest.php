<?php

declare(strict_types=1);

use Dennykuo\AdminFerry\View\Components\Pages\Auth\Login;
use Dennykuo\AdminFerry\View\Components\Pages\Auth\ForgotPassword;
use Dennykuo\AdminFerry\View\Components\Pages\Auth\ResetPassword;

test('Login component can be instantiated', function () {
    $component = new Login('/login');

    expect($component->submitUrl)->toBe('/login')
        ->and($component->passwordResetUrl)->toBeNull()
        ->and($component->heading)->toBe('HELLO');
});

test('Login component accepts all parameters', function () {
    $component = new Login(
        '/login',
        '/forgot-password',
        'Welcome Back'
    );

    expect($component->submitUrl)->toBe('/login')
        ->and($component->passwordResetUrl)->toBe('/forgot-password')
        ->and($component->heading)->toBe('Welcome Back');
});

test('Login component renders view', function () {
    $component = new Login('/login');
    $view = $component->render();

    expect($view)->not->toBeNull();
});

test('ForgotPassword component can be instantiated', function () {
    $component = new ForgotPassword('/forgot-password');

    expect($component->submitUrl)->toBe('/forgot-password');
});

test('ForgotPassword component renders view', function () {
    $component = new ForgotPassword('/forgot-password');
    $view = $component->render();

    expect($view)->not->toBeNull();
});

test('ResetPassword component can be instantiated', function () {
    $component = new ResetPassword('/reset-password');

    expect($component->submitUrl)->toBe('/reset-password');
});

test('ResetPassword component renders view', function () {
    $component = new ResetPassword('/reset-password');
    $view = $component->render();

    expect($view)->not->toBeNull();
});

test('Login component properties are readonly', function () {
    $component = new Login('/login');

    expect(fn () => $component->submitUrl = '/new-login')
        ->toThrow(Error::class);
});
