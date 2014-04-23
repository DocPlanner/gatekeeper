<?php
/**
 * Author: Łukasz Barulski
 * Date: 23.04.14 13:47
 */

namespace GateKeeper\Repository;

use GateKeeper\Model\ModelInterface;

interface RepositoryInterface
{
	/**
	 * @param ModelInterface $gateKeeperModel
	 *
	 * @return bool
	 */
	public function save(ModelInterface $gateKeeperModel);

	/**
	 * @param ModelInterface $gateKeeperModel
	 *
	 * @return bool
	 */
	public function update(ModelInterface $gateKeeperModel);

	/**
	 * @param ModelInterface $gateKeeperModel
	 *
	 * @return bool
	 */
	public function delete(ModelInterface $gateKeeperModel);

	/**
	 * @param string $name
	 *
	 * @return ModelInterface|null
	 */
	public function get($name);
}