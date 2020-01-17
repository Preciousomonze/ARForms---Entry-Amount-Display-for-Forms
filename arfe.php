<?php
/**
 * Plugin Name: ARForms - Entry Amount Display for Forms
 * Plugin URI: https://github.com/Preciousomonze/ARForms---Entry-Amount-Display-for-Forms
 * Description: This Plugin helps print out the counted number of enteries for a particular form via the shortcode <strong><code>[pk_ARForms_entry_count form_id="{id}"]</code> replace {id} with an actual form id :)</strong>. This plugin is fully dependent on ARForms Plugin, therefore requires Arforms builder plugin to be active.
 * Author: Precious Omonze (CodeXplorer 🙂 🦜)
 * Author URI: https://codexplorer.ninja
 * Licence: MIT
 * Version: 1.0.0
 * Requires at least: 5.3
 * Tested up to: 5.3
 */

if (!defined('ABSPATH')) {
    exit;
}
/**
 * Shortcode
 * @param $atts
 * @return mixed
 */
function pekky_arfe_shortcode($atts){
    $atts = shortcode_atts( array(
        'form_id' => ''
    ), $atts );
	$form = $atts['form_id'];
	if(empty($form) || $form == 0 || !class_exists('arrecordmodel')){
		return '';
	}
	$model = new arrecordmodel();
	return $model->getRecordCount($form);
}
add_shortcode('pk_ARForms_entry_count','pekky_arfe_shortcode');
