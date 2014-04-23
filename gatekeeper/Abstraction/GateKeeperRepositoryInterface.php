<?php
/**
 * Author: Łukasz Barulski
 * Date: 23.04.14 13:47
 */

namespace GateKeeper\Abstraction;

interface GateKeeperRepositoryInterface
{
	/**
	 * @param GateKeeperModelInterface $gateKeeperModel
	 *
	 * @return bool
	 */
	public function save(GateKeeperModelInterface $gateKeeperModel);

	/**
	 * @param GateKeeperModelInterface $gateKeeperModel
	 *
	 * @return bool
	 */
	public function update(GateKeeperModelInterface $gateKeeperModel);

	/**
	 * @param GateKeeperModelInterface $gateKeeperModel
	 *
	 * @return bool
	 */
	public function delete(GateKeeperModelInterface $gateKeeperModel);
}