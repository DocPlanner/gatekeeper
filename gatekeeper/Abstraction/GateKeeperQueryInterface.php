<?php
/**
 * Author: Łukasz Barulski
 * Date: 22.04.14 15:48
 */

namespace GateKeeper\Abstraction;

interface GateKeeperQueryInterface
{
	/**
	 * @param string $name
	 *
	 * @return GateKeeperModelInterface
	 */
	public function getGateByName($name);
} 