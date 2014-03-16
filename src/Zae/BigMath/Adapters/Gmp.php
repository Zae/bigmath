<?php

namespace Zae\BigMath\Adapters;

/**
 * BigMath Adapter for the GMP extension.
 *
 * @author Ezra Pool <ezra@tsdme.nl>
 * @license MIT
 */
class Gmp implements BigMathAdapter {
	protected $base = 10;

	public function Add($left, $right) {
		return $this->string(gmp_add($left, $right));
	}

	public function Cmp($left, $right) {
		return $this->string(gmp_cmp($left, $right));
	}

	public function Div($left, $right) {
		return $this->string(gmp_div_q($left, $right));
	}

	public function Mod($left, $modulus) {
		return $this->string(gmp_mod($left, $modulus));
	}

	public function Mul($left, $right) {
		return $this->string(gmp_mul($left, $right));
	}

	public function Pow($left, $right) {
		return $this->string(gmp_pow($left, $right));
	}

	public function PowMod($left, $right, $modulus) {
		return $this->string(gmp_powm($left, $right, $modulus));
	}

	public function Sqr($left) {
		return $this->string(gmp_sqrt($left));
	}

	public function Sub($left, $right) {
		return $this->string(gmp_sub($left, $right));
	}

	protected function string($resource) {
		return gmp_strval($resource, $this->base);
	}
}
