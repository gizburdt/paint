<?php

namespace Gizburdt\Paint;

/**
 * Classes using this trait must declare the presenter class on their own property:
 * a native property takes precedence over a `@property` tag on the trait.
 *
 * @template TPresenter of Presenter<*>
 */
trait Presentable
{
    /**
     * @var TPresenter|null
     */
    protected mixed $instance = null;

    /**
     * @return TPresenter
     */
    public function present(): mixed
    {
        if (! $this->presenter || ! class_exists($this->presenter)) {
            throw new PresenterException('Please set the $presenter property to your presenter path.');
        }

        if (! $this->instance) {
            $this->instance = new $this->presenter($this);
        }

        return $this->instance;
    }
}
