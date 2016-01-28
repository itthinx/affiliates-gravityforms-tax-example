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
 * Description: An example plugin.
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
	 * Add filter hooks.
	 */
	public static function init() {
		add_filter( 'affiliates_gravity_forms_products_amount', array( __CLASS__, 'affiliates_gravity_forms_products_amount' ), 10, 3 );
		add_filter( 'affiliates_gravity_forms_amount', array( __CLASS__, 'affiliates_gravity_forms_amount' ), 10, 3 );
	}

	/**
	 * Product amount filter.
	 * 
	 * @param float $amount
	 * @param array $products
	 * @param array $entry
	 * @return float
	 */
	public static function affiliates_gravity_forms_products_amount( $amount, $products, $entry ) {
		error_log(var_export($products,true));
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
