<?php
/**
 * Author: Łukasz Barulski
 * Date: 23.04.14 16:10
 */

namespace GateKeeper\Access;

use GateKeeper\Item\ItemInterface;

interface AccessInterface
{
	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @param ItemInterface $object
	 *
	 * @return $this
	 */
	public function setObject(ItemInterface $object = null);

	/**
	 * @param array $attributes
	 *
	 * @return $this
	 */
	public function setAttributes(array $attributes);

	/**
	 * @return bool
	 */
	public function hasAccess();
} 
