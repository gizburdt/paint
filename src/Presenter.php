<?php

namespace Gizburdt\Paint;

/**
 * @template TEntity
 */
abstract class Presenter
{
    /**
     * @var TEntity
     */
    protected mixed $entity;

    /**
     * @param  TEntity  $entity
     */
    public function __construct(mixed $entity)
    {
        $this->entity = $entity;
    }

    public function __get(string $property): mixed
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }
}
