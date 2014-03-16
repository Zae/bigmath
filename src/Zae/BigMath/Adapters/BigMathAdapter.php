<?php

namespace Zae\BigMath\Adapters;

/**
 * BigMath Adapter interface.
 *
 * BigMath Adapters should implement this interface, to stay compatible with eachother.
 * @author Ezra Pool <ezra@tsdme.nl>
 * @license MIT
 */
interface BigMathAdapter {
	public function Add($left, $right);
	public function Sub($left, $right);
	public function Mul($left, $right);
	public function Div($left, $right);
	public function Pow($left, $right);

	public function Cmp($left, $right);

	public function Mod($left, $modulus);
	public function PowMod($left, $right, $modulus);
	public function Sqr($left);
}
