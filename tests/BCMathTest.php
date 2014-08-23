<?php

use Zae\BigMath\BigMath;

class BCMathTest extends PHPUnit_Framework_TestCase
{

	public function testLateStaticBinding()
	{
		$answer = BigMath::Add(10)->Add(10);

		$this->assertEquals("20", $answer);
	}

	/**
	 * @param $a
	 * @param $b
	 * @param $expected
	 *
	 * @dataProvider additionProvider
	 * @depends testLateStaticBinding
	 */
	public function testAddition($a, $b, $expected)
	{
		$this->assertEquals($expected, BigMath::Add($a)->Add($b));
	}

	/**
	 * @param $a
	 * @param $b
	 * @param $expected
	 *
	 * @dataProvider subtractionProvider
	 * @depends testLateStaticBinding
	 */
	public function testSubtraction($a, $b, $expected)
	{
		$this->assertEquals($expected, BigMath::add($a)->Sub($b));
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

	public function subtractionProvider()
	{
		return array(
			array(0, 0, "0"),
			array(0, 1, "-1"),
			array(1, 0, "1"),
			array(1, 1, "0"),
			array(4, 2, "2"),
			array(5, 2, "3"),
		);
	}
}
