<?php

namespace Gizburdt\Paint\Test\Fixtures;

use Gizburdt\Paint\Presentable;

class UserWithoutPresenter
{
    use Presentable;

    protected ?string $presenter = null;
}
