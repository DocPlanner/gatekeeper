<?php
/**
 * Author: Łukasz Barulski
 * Date: 22.04.14 15:42
 */

namespace GateKeeper;

use GateKeeper\Access\AccessInterface;
use GateKeeper\Object\ObjectInterface;
use GateKeeper\Repository\RepositoryInterface;

class GateKeeper
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
	 * @return $this
	 */
	public function addAccess(AccessInterface $access)
	{
		$this->accessList[$access->getName()] = $access;

		return $this;
	}

	/**
	 * @param string          $gateName
	 * @param ObjectInterface $object
	 * @param array           $attributes
	 *
	 * @return bool
	 */
	public function hasAccess($gateName, ObjectInterface $object = null, $attributes = [])
	{
		$gateModel = $this->repository->get($gateName);
		if (null === $gateModel)
		{
			return false;
		}

		$access = $gateModel->getAccess();
		$access = $this->getAccess($access);
		if (null !== $object)
		{
			$access->setObject($object);
		}

		$access->setAttributes($attributes);

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