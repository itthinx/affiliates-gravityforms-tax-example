=== Affiliates Gravity Forms Tax Example ===
Contributors: itthinx
Donate link: http://www.itthinx.com/shop/affiliates-pro/
Tags: affiliate, affiliates, captcha
Requires at least: 4.0.0
Tested up to: 4.4.1
Stable tag: 1.0.0
License: GPLv3

 Gravity Forms lacks dedicated tax fields. This plugin deducts product form fields representing taxes when calculating product referral commissions.

== Description ==

Gravity Forms lacks proper support for taxes, this plugin remedies the issue where a commission should be based on the net product amount, excluding taxes.
This plugin will deduct the amount corresponding to any product form field named 'tax' or 'taxes' (case-insensitive) from the amount taken to calculate commissions based on product fields.
Activate the plugin to deduct product fields named 'tax' or 'taxes' (case-insensitive) from the amount taken to calculate commissions based on product fields.

= Usage =

- Add a product field to your form, we will assume that this field has Field ID 1, it's Field Type is Single Product, it has a price and the quantity field is enabled.
- Optionally add a Shipping field.
- Add a Total field.
- Add another product field to your form, use Field Type "Calculation", disable its quantity field and use the following Formula to compute a 20% tax rate based on the product price and quantity: `{Product Name (Quantity):1.3}*{Product Name (Price):1.2}*0.2`

= Requirements =

- [Affiliates Pro](http://www.itthinx.com/shop/affiliates-pro/) or [Affiliates Enterprise](http://www.itthinx.com/shop/affiliates-enterprise/), Gravity Forms and the Gravity Forms integration.

The filter `affiliates_gravity_forms_tax_example_fields` can be used to include the names of other or alternative fields that should be deducted.
The filter passes an array of field names that will be deducted if present.
It should return an array of string with the names of product fields that should be deducted.
Fields are detected based on their name in a case-insensitive manner.
