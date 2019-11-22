<?php
/**
 * Author: Łukasz Barulski
 * Date: 22.04.14 15:07
 */

namespace GateKeeper\Access;

use GateKeeper\Item\ItemInterface;

abstract class AbstractAccess implements AccessInterface
{
	/**
	 * @var ItemInterface
	 */
	protected $object;

	/**
	 * @var array
	 */
	protected $attributes = [];

	/**
	 * @inheritdoc
	 */
	public function setObject(ItemInterface $object = null)
	{
		$this->object = $object;

		return $this;
	}

	/**
	 * @inheritdoc
	 */
	public function setAttributes(array $attributes)
	{
		$this->attributes = $attributes;

		return $this;
	}

	/**
	 * @inheritdoc
	 */
	public function hasAccess()
	{
		return false;
	}
}
