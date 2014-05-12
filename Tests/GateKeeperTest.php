<?php
/**
 * Author: Łukasz Barulski
 * Date: 30.04.14 10:37
 */

namespace GateKeeper\Tests;

use GateKeeper\Access\AccessInterface;
use GateKeeper\GateKeeper;
use GateKeeper\Model\ModelInterface;
use GateKeeper\Repository\DummyRepository;
use GateKeeper\Repository\RepositoryInterface;

class GateKeeperTest extends \PHPUnit_Framework_TestCase
{
	public function testHasAccessDummyRepository()
	{
		$repository = new DummyRepository;
		$gateKeeper = new GateKeeper($repository);

		$result = $gateKeeper->hasAccess('not_existing_gate');

		$this->assertFalse($result);
	}

	public function testHasAccessDummyRepositoryWithAllowAccesses()
	{
		$model = $this->prepareModel('allow');
		$repository = $this->prepareRepository($model);
		$access = $this->prepareAccess('allow', true);

		$gateKeeper = new GateKeeper($repository);
		$gateKeeper->addAccess($access);

		$result = $gateKeeper->hasAccess('existing_gate');

		$this->assertTrue($result);
	}

	public function testHasAccessDummyRepositoryWithDenyAccesses()
	{
		$model = $this->prepareModel('deny');
		$repository = $this->prepareRepository($model);
		$access = $this->prepareAccess('deny', false);

		$gateKeeper = new GateKeeper($repository);
		$gateKeeper->addAccess($access);

		$result = $gateKeeper->hasAccess('existing_gate');

		$this->assertFalse($result);
	}

	public function testObjectIsSet()
	{
		$model = $this->prepareModel('allow');
		$repository = $this->prepareRepository($model);
		$access = $this->prepareAccess('allow', true);
		$object = $this->getMock('\GateKeeper\Object\ObjectInterface');
		$access->expects($this->once())->method('setObject')->with($object);

		$gateKeeper = new GateKeeper($repository);
		$gateKeeper->addAccess($access);

		$result = $gateKeeper->hasAccess('existing_gate', $object);

		$this->assertTrue($result);
	}

	public function testAttributesIsSet()
	{
		$model = $this->prepareModel('allow');
		$repository = $this->prepareRepository($model);
		$access = $this->prepareAccess('allow', true);
		$attributes = [123 => 321];
		$access->expects($this->once())->method('setAttributes')->with($attributes);

		$gateKeeper = new GateKeeper($repository);
		$gateKeeper->addAccess($access);

		$result = $gateKeeper->hasAccess('existing_gate', null, $attributes);

		$this->assertTrue($result);
	}

	/**
	 * @param string $name
	 *
	 * @return \PHPUnit_Framework_MockObject_MockObject|ModelInterface
	 */
	private function prepareModel($name)
	{
		$model = $this->getMock('\GateKeeper\Model\ModelInterface');
		$model->expects($this->once())->method('getAccess')->will($this->returnValue($name));

		return $model;
	}

	/**
	 * @param ModelInterface $model
	 *
	 * @return \PHPUnit_Framework_MockObject_MockObject|RepositoryInterface
	 */
	private function prepareRepository($model)
	{
		$repository = $this->getMock('\GateKeeper\Repository\DummyRepository');
		$repository->expects($this->any())
				   ->method('get')
				   ->will($this->returnValue($model));

		return $repository;
}

	/**
	 * @param string $name
	 * @param bool $hasAccess
	 *
	 * @return \PHPUnit_Framework_MockObject_MockObject|AccessInterface
	 */
	private function prepareAccess($name, $hasAccess)
	{
		$access = $this->getMock('\GateKeeper\Access\AccessInterface');
		$access->expects($this->once())->method('getName')->will($this->returnValue($name));
		$access->expects($this->once())->method('hasAccess')->will($this->returnValue($hasAccess));

		return $access;
	}
}