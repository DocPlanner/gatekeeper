<?php
/**
 * Author: Łukasz Barulski
 * Date: 22.04.14 15:42
 */

namespace GateKeeper;

class Keeper
{
	/**
	 * @var Abstraction\GateKeeperQueryInterface
	 */
	protected $gateKeeperQuery;

	/**
	 * @var array
	 */
	protected $accessList = [];

	/**
	 * @param Abstraction\GateKeeperQueryInterface $gateKeeperQuery
	 */
	public function __construct(Abstraction\GateKeeperQueryInterface $gateKeeperQuery)
	{
		$this->gateKeeperQuery = $gateKeeperQuery;
	}

	/**
	 * @param Abstraction\AbstractAccess $access
	 *
	 * @return void
	 */
	public function addAccess(Abstraction\AbstractAccess $access)
	{
		$this->accessList[$access->getName()] = $access;
	}

	/**
	 * @param string        $gateName
	 * @param Abstraction\UserInterface $user
	 *
	 * @return bool
	 */
	public function hasAccess($gateName, Abstraction\UserInterface $user = null)
	{
		$gateModel = $this->gateKeeperQuery->getGateByName($gateName);
		if (null === $gateModel)
		{
			return false;
		}

		$access = $gateModel->getAccess();
		$access = $this->getAccess($access);
		if (null !== $user)
		{
			$access->setUser($user);
		}

		return $access->hasAccess();
	}

	/**
	 * @param $accessName
	 *
	 * @return Abstraction\AbstractAccess|null
	 */
	protected function getAccess($accessName)
	{
		return isset($this->accessList[$accessName]) ? $this->accessList[$accessName] : null;
	}
} 