<?php

namespace Gizburdt\Paint\Test\Fixtures;

use Gizburdt\Paint\Presentable;

class User
{
    /** @use Presentable<UserPresenter> */
    use Presentable;

    /** @var class-string<UserPresenter> */
    protected string $presenter = UserPresenter::class;

    public function __construct(
        public string $first_name = 'John',
        public string $last_name = 'Doe',
    ) {}
}
