<?php
/**
 * Author: Łukasz Barulski
 * Date: 29.04.14 15:28
 */

namespace GateKeeper\Provider;

class DummyGatesProvider implements GatesProviderInterface
{
	/**
	 * @return array
	 */
	public function getGates()
	{
		return [];
	}
}