<?php

use Zae\BigMath\BigMath;

class BCMathTest extends PHPUnit_Framework_TestCase
{

	public function testLateStaticBinding()
	{
		$answer = BigMath::add(10)->add(10);

		$this->assertEquals("20", $answer);
	}

	/**
	 * @param $a
	 * @param $b
	 * @param $expected
	 *
	 * @dataProvider additionProvider
	 */
	public function testAddition($a, $b, $expected)
	{
		$this->assertEquals($expected, BigMath::add($a)->add($b));
	}

	public function additionProvider()
	{
		return array(
			array(0, 0, "0"),
			array(0, 1, "1"),
			array(1, 0, "1"),
			array(1, 1, "2")
		);
	}
}
