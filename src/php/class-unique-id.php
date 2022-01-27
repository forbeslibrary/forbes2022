<?php
/**
 * Defines a simple class for getting and using a persitent unique identifier.
 *
 * @package Forbes2022
 */

namespace ForbesLibrary\WordPress\Forbes2022;

/**
 * A simple class for getting and using a persitent unique identifier.
 */
class Unique_ID {

	/**
	 * The actual id, as a string, as a private member of the class to ensure it
	 * isn't changed accidentally.
	 *
	 * @var string $id The unique id.
	 */
	private $id;

	/**
	 * Creates a Unique_ID object using the optional $prefix.
	 *
	 * The id used internally is generated with wp_unique_id(). The returned value
	 * is not universally unique, but it is unique across the life of the PHP
	 * process.
	 *
	 * @param ?string $prefix Prefix for the returned ID.
	 */
	public function __construct( ?string $prefix ) {
		$this->id = wp_unique_id( esc_attr( $prefix ) );
	}

	/**
	 * Echos the unique id.
	 */
	public function echo() : void {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $this->id;
	}

	/**
	 * Returns the unique id.
	 */
	public function get() : string {
		return $this->id;
	}

	/**
	 * Converts this Unique_ID object to a string.
	 */
	public function __toString() : string {
		return $this->id;
	}
}
