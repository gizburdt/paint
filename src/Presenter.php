<?php

namespace Gizburdt\Curator;

abstract class Presenter
{
	protected mixed $entity;

	function __construct(mixed $entity)
	{
		$this->entity = $entity;
	}

	public abstract function present();

	public function __get(mixed $property): mixed
	{
		if (method_exists($this, $property)) {
			return $this->{$property}();
		}

		return $this->entity->{$property};
	}
}
