<?php

namespace Gizburdt\Paint;

abstract class Presenter
{
    protected mixed $entity;

    public function __construct(mixed $entity)
    {
        $this->entity = $entity;
    }

    public function __get(mixed $property): mixed
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }
}
