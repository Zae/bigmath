<?php

namespace Zae\BigMath\Adapters;

/**
 * BigMath Adapter for the Bcmath extension
 *
 * @author Ezra Pool <ezra@tsdme.nl>
 * @license MIT
 */
class Bcmath implements BigMathAdapter {
	protected $scale = 6;
	
	public function Add($left, $right) {
		return bcadd($left, $right, $this->scale);
	}

	public function Div($left, $right) {
		return bcdiv($left, $right, $this->scale);
	}

	public function Mod($left, $modulus) {
		return bcmod($left, $modulus);
	}

	public function Mul($left, $right) {
		return bcmul($left, $right, $this->scale);
	}

	public function Pow($left, $right) {
		return bcpow($left, $right, $this->scale);
	}

	public function Sqr($left) {
		return bcsqrt($left, $this->scale);
	}

	public function Sub($left, $right) {
		return bcsub($left, $right, $this->scale);
	}

	public function Cmp($left, $right) {
		return bccomp($left, $right, $this->scale);
	}

	public function PowMod($left, $right, $modulus) {
		return bcpowmod($left, $right, $modulus, $this->scale);
	}

}
