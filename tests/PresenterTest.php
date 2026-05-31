<?php

use Gizburdt\Paint\PresenterException;
use Gizburdt\Paint\Test\Fixtures\User;
use Gizburdt\Paint\Test\Fixtures\UserPresenter;
use Gizburdt\Paint\Test\Fixtures\UserWithInvalidPresenter;
use Gizburdt\Paint\Test\Fixtures\UserWithoutPresenter;

it('resolves the presenter instance', function () {
    $user = new User;

    expect($user->present())
        ->toBeInstanceOf(UserPresenter::class);
});

it('caches the presenter instance', function () {
    $user = new User;

    expect($user->present())
        ->toBe($user->present());
});

it('calls a method on the presenter', function () {
    $user = new User('John', 'Doe');

    expect($user->present()->fullName())
        ->toBe('John Doe');
});

it('proxies method calls through the magic getter', function () {
    $user = new User('John', 'Doe');

    expect($user->present()->name)
        ->toBe('JOHN');
});

it('falls back to the entity property through the magic getter', function () {
    $user = new User('John', 'Doe');

    expect($user->present()->last_name)
        ->toBe('Doe');
});

it('throws when no presenter is set', function () {
    $user = new UserWithoutPresenter;

    expect(fn () => $user->present())
        ->toThrow(PresenterException::class);
});

it('throws when the presenter class does not exist', function () {
    $user = new UserWithInvalidPresenter;

    expect(fn () => $user->present())
        ->toThrow(PresenterException::class);
});
