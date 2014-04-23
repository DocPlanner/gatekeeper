<?php
/**
 * Author: Łukasz Barulski
 * Date: 22.04.14 15:42
 */

namespace GateKeeper;

use GateKeeper\Access\AccessInterface;
use GateKeeper\Repository\RepositoryInterface;
use GateKeeper\User\UserInterface;

class Keeper
{
	/**
	 * @var RepositoryInterface
	 */
	protected $repository;

	/**
	 * @var array
	 */
	protected $accessList = [];

	/**
	 * @param RepositoryInterface $repository
	 */
	public function __construct(RepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * @param AccessInterface $access
	 *
	 * @return void
	 */
	public function addAccess(AccessInterface $access)
	{
		$this->accessList[$access->getName()] = $access;
	}

	/**
	 * @param string        $gateName
	 * @param UserInterface $user
	 *
	 * @return bool
	 */
	public function hasAccess($gateName, UserInterface $user = null)
	{
		$gateModel = $this->repository->get($gateName);
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
	 * @return AccessInterface|null
	 */
	protected function getAccess($accessName)
	{
		return isset($this->accessList[$accessName]) ? $this->accessList[$accessName] : null;
	}
} 