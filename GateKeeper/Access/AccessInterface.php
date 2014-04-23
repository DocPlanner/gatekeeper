<?php
/**
 * Author: Łukasz Barulski
 * Date: 23.04.14 16:10
 */

namespace GateKeeper\Access;

use GateKeeper\User\UserInterface;

interface AccessInterface
{
	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @param UserInterface $user
	 *
	 * @return void
	 */
	public function setUser(UserInterface $user = null);

	/**
	 * @return bool
	 */
	public function hasAccess();
} 