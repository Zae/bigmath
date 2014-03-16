<?php

namespace Zae\BigMath;

/**
 * Math library that wraps around several high precision math extensions.
 *
 * @see Zae\BigMath\Adapters\BigMathAdapter
 * @author Ezra Pool <ezra@tsdme.nl>
 * @license MIT
 */
class BigMath {
	protected $value = "0";
	protected $double = true;
	protected $adapter;

	/**
	 * Create a new object to do your calculations with.

	 * @param string $value Value to start out with, defaults to "0"
	 * @param boolean $double Do you want to have support for decimal numbers?, defaults to TRUE
	 * @param \Zae\BigMath\Zae\BigMath\Adapters\BigMathAdapter $adapter Adapter to do the actual calculations. Automatically chooses the best adapter.
	 */
	public function __construct($value = "0", $double = true, Adapters\BigMathAdapter $adapter = NULL) {
		$this->value = $value;
		$this->double = $double;

		if ($adapter === NULL) {
			$this->adapter = self::getAdapter($this->double);
		} else {
			$this->adapter = $adapter;
		}
	}

	/**
	 * Call one of the calculation functions in the adapter.
	 *
	 * @param string $method
	 * @param array $parameters
	 * @return \Zae\BigMath\BigMath Returns a BigMath object for chainability.
	 */
	public function __call($method, $parameters) {
		array_unshift($parameters, $this->value);
		$newvalue = call_user_func_array(array($this->adapter, $method), $parameters);
		return new BigMath($newvalue, $this->double, $this->adapter);
	}
	
	/**
	 * Handle dynamic static method calls into the method.
	 *
	 * @param string $method
	 * @param array $parameters
	 * @return \Zae\BigMath\BigMath BigMath object for chainability.
	 */
	public static function __callStatic($method, $parameters) {
		$instance = new static;
		return call_user_func_array(array($instance, $method), $parameters);
	}

	/**
	 * Convert the number to its string representation.
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->value;
	}

	/**
	 * Get the best suited adapter for your server configuration.
	 *
	 * @param boolean $double Do you want to have support for decimal numbers?, defaults to TRUE
	 * @return \Zae\BigMath\Zae\BigMath\Adapters\Bcmath|\Zae\BigMath\Zae\BigMath\Adapters\Gmp
	 * @throws Exception If no suitable adapters are found.
	 */
	public static function getAdapter($double = TRUE) {
		switch(true) {
			case extension_loaded('gmp') && !$double:
				return new Adapters\Gmp;
			case extension_loaded('bcmath'):
				return new  Adapters\Bcmath;
			default:
				throw new Exception('No suitable math extensions loaded');
		}
	}

	/**
	 * Set the adapter to use after instantiation.
	 *
	 * @param \Zae\BigMath\Zae\BigMath\Adapters\BigMathAdapter $adapter
	 * @return \Zae\BigMath\BigMath BigMath object for chainability.
	 */
	public function setAdapter(Adapters\BigMathAdapter $adapter) {
		return new BigMath($this->value, $adapter);
	}

	/**
	 * Set the use of doubles. (Might automatically change the adapter)
	 * @param boolean $double
	 * @return \Zae\BigMath\BigMath BigMath object for chainability.
	 */
	public function setDouble($double) {
		return new BigMath($this->value, $double);
	}

}
