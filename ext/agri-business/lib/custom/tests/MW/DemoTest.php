<?php

namespace Aimeos\MW;


/**
 * @copyright Metaways Infosystems GmbH, 2013
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2016
 */
class DemoTest extends \PHPUnit\Framework\TestCase
{
	private $object;


	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		// $this->object = new \Aimeos\MW\View\Helper\Test\Standard();
	}


	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		unset( $this->object );
	}


	public function testDemo()
	{
		$this->markTestIncomplete( 'Just a demo' );
	}
}