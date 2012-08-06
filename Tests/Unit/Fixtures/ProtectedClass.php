<?php
/**
 * Test class.
 */
class Tx_Phpunit_Tests_Fixtures_ProtectedClass {
	/**
	 * @var string
	 */
	protected $protectedProperty = 'This is a protected property.';

	/**
	 * @var string
	 */
	public $publicProperty = 'This is a public property.';

	/**
	 * @var string
	 */
	protected static $protectedStaticProperty = 'This is a protected static property.';

	/**
	 * Protected test function which returns TRUE when processed.
	 *
	 * @return boolean always TRUE
	 */
	protected function protectedMethod() {
		return TRUE;
	}

	/**
	 * This function returns the number of passed arguments and their values.
	 *
	 * @return string a summary of the passed arguments, will not be empty
	 */
	protected function argumentChecker() {
		return func_num_args() . ': ' . implode(', ', func_get_args());
	}

	/**
	 * Public test function which returns TRUE when processed.
	 *
	 * @return boolean always TRUE
	 */
	public function publicMethod() {
		return TRUE;
	}
}
?>