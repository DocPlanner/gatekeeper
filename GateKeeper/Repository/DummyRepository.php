<?php
/**
 * Author: Łukasz Barulski
 * Date: 24.04.14 11:13
 */

namespace GateKeeper\Repository;

use GateKeeper\Model\ModelInterface;

class DummyRepository implements RepositoryInterface
{
	/**
	 * @inheritdoc
	 */
	public function save(ModelInterface $gateKeeperModel)
	{
		// TODO: Implement save() method.
	}

	/**
	 * @inheritdoc
	 */
	public function update(ModelInterface $gateKeeperModel)
	{
		// TODO: Implement update() method.
	}

	/**
	 * @inheritdoc
	 */
	public function delete(ModelInterface $gateKeeperModel)
	{
		// TODO: Implement delete() method.
	}

	/**
	 * @inheritdoc
	 */
	public function get($name)
	{
		// TODO: Implement get() method.
	}
}