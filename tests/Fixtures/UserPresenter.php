<?php

namespace Gizburdt\Paint\Test\Fixtures;

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
