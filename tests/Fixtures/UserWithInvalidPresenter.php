<?php

namespace Gizburdt\Paint\Test\Fixtures;

use Gizburdt\Paint\Presentable;

class UserWithInvalidPresenter
{
    use Presentable;

    protected string $presenter = 'Gizburdt\\Paint\\Test\\Fixtures\\NonExistentPresenter';
}
