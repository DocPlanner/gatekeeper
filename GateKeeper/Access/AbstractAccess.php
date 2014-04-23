<?php
/**
 * Author: Łukasz Barulski
 * Date: 22.04.14 15:07
 */

namespace GateKeeper\Access;

use GateKeeper\User\UserInterface;

abstract class AbstractAccess
{
	/**
	 * @param UserInterface $userInterface
	 *
	 * @return void
	 */
	public abstract function setUser(UserInterface $userInterface = null);

	/**
	 * @return string
	 */
	public abstract function getName();

	/**
	 * @return bool
	 */
	public function hasAccess()
	{
		return false;
	}
}