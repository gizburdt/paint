# Paint

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gizburdt/paint.svg?style=flat-square)](https://packagist.org/packages/gizburdt/paint)
[![Total Downloads](https://img.shields.io/packagist/dt/gizburdt/paint.svg?style=flat-square)](https://packagist.org/packages/gizburdt/paint)
[![Tests](https://img.shields.io/github/actions/workflow/status/gizburdt/paint/run-tests.yml?branch=master&label=tests&style=flat-square)](https://github.com/gizburdt/paint/actions/workflows/run-tests.yml)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Manipulate, transform and present data with ease.

## Installation

You can install the package via composer:

``` bash
composer require gizburdt/paint
```

## Usage

Create a presenter by extending `Presenter` and adding methods. The original object is
available as `$this->entity`.

``` php
use Gizburdt\Paint\Presenter;

class UserPresenter extends Presenter
{
    public function fullName(): string
    {
        return "{$this->entity->first_name} {$this->entity->last_name}";
    }

    public function name(): string
    {
        return strtoupper($this->entity->first_name);
    }
}
```

Add the `Presentable` trait to the class you want to present and point the `$presenter`
property to your presenter:

``` php
use Gizburdt\Paint\Presentable;

class User
{
    use Presentable;

    protected string $presenter = UserPresenter::class;
}
```

Call `present()` to get the presenter instance. Methods can be accessed as properties,
and any property that is not defined on the presenter falls back to the entity:

``` php
$user = User::find(1);

$user->present()->fullName();   // "John Doe"  (regular method call)
$user->present()->name;         // "JOHN"      (name() accessed as a property)
$user->present()->email;        // falls back to $user->email
```

## Testing

``` bash
composer test
```
