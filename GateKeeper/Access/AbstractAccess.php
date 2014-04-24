<?php
/**
 * Author: Łukasz Barulski
 * Date: 22.04.14 15:07
 */

namespace GateKeeper\Access;

use GateKeeper\User\UserInterface;

abstract class AbstractAccess implements AccessInterface
{
	/**
	 * @var UserInterface
	 */
	protected $user;

	/**
	 * @inheritdoc
	 */
	public function setUser(UserInterface $user = null)
	{
		$this->user = $user;
	}

	/**
	 * @inheritdoc
	 */
	public function hasAccess()
	{
		return false;
	}
}