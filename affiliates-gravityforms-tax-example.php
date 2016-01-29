<?php
/**
 * affiliates-gravityforms-tax-example.php
 *
 * Copyright (c) 2016 www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author itthinx
 *
 * Plugin Name: Affiliates Gravity Forms Tax Example
 * Plugin URI: http://www.itthinx.com/shop/affiliates-pro/
 * Description: Gravity Forms lacks proper support for taxes. This plugin will deduce the amount corresponding to any product form field named 'Tax' or 'Taxes' from the amount taken to calculate commissions based on product fields.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: http://www.itthinx.com
 * Donate-Link: http://www.itthinx.com
 * License: GPLv3
 */

/**
 * Exapmle implementation using the filters provided in our Gravity Forms integration
 * provided with Affiliates Pro and Affiliates Enterprise.
 */
class Affiliates_Gravity_Forms_Tax_Example {

	/**
	 * Field names for those considered as taxes.
	 * @var array of string
	 */
	public static $tax_fields = array( 'tax', 'taxes' );

	/**
	 * Add filter hooks.
	 */
	public static function init() {
		add_filter( 'affiliates_gravity_forms_products_amount', array( __CLASS__, 'affiliates_gravity_forms_products_amount' ), 10, 3 );
		add_filter( 'affiliates_gravity_forms_amount', array( __CLASS__, 'affiliates_gravity_forms_amount' ), 10, 3 );
		self::$tax_fields = apply_filters( 'affiliates_gravity_forms_tax_example_fields', self::$tax_fields );
	}

	/**
	 * Product amount filter - this will deduct any field named 'Tax' (case-insensitive) from the $amount.
	 * 
	 * @param float $amount
	 * @param array $products
	 * @param array $entry
	 * @return float
	 */
	public static function affiliates_gravity_forms_products_amount( $amount, $products, $entry ) {
		if ( isset( $products['products'] ) && is_array( $products['products'] ) ) {
			foreach( $products['products'] as $id => $values ) {
				if (
					isset( $values['name'] ) &&
					isset( $values['price'] ) &&
					in_array( strtolower( $values['name'] ), array_map( 'strtolower', self::$tax_fields ) )
				) {
					if ( class_exists( 'GFCommon' ) && method_exists( 'GFCommon', 'to_number' ) ) {
						$tax = GFCommon::to_number( $values['price'] );
						$amount -= floatval( $tax );
					}
				}
			}
		}
		return $amount;
	}

	/**
	 * Amount filter.
	 * 
	 * @param float $amount
	 * @param array $entry
	 * @param array $parameters
	 * @return float
	 */
	public static function affiliates_gravity_forms_amount( $amount, $entry, $parameters ) {
		// We don't do anything here with this filter and just return the amount,
		// you can remove it or you can adjust it if needed.
		return $amount;
	}
}
Affiliates_Gravity_Forms_Tax_Example::init();
