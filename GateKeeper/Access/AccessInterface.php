<?php
/**
 * Author: Łukasz Barulski
 * Date: 23.04.14 16:10
 */

namespace GateKeeper\Access;

use GateKeeper\Object\ObjectInterface;

interface AccessInterface
{
	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @param ObjectInterface $object
	 *
	 * @return $this
	 */
	public function setObject(ObjectInterface $object = null);

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