<?php

namespace Gizburdt\Curator;

trait Presentable
{
	protected mixed $instance;

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
